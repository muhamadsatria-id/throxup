<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\Profile;
use App\Models\SeoMeta;
use App\Services\SeoService;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

trait HasSeoMeta
{
    public function seoMeta(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    public static function bootHasSeoMeta(): void
    {
        static::created(function ($model) {
            $model->createAutomaticSeoMeta();
        });

        static::updated(function ($model) {
            $seoMeta = $model->seoMeta()->first();

            // Jika record lama belum punya seoMeta, buatkan otomatis
            if (! $seoMeta) {
                $model->createAutomaticSeoMeta();

                return;
            }

            // Jika sudah di-override manual oleh admin di Filament, jangan ditimpa
            if ($seoMeta->is_manual) {
                return;
            }

            $seoMeta->update($model->automaticSeoMetaPayload());
        });

        // Bersihkan record seo_metas saat parent model dihapus (karena morph tidak pakai cascade DB)
        static::deleted(function ($model) {
            $model->seoMeta()->delete();
        });
    }

    protected function createAutomaticSeoMeta(): void
    {
        if ($this->seoMeta()->exists()) {
            return;
        }

        $this->seoMeta()->create($this->automaticSeoMetaPayload() + [
            'is_manual' => false,
        ]);
    }

    protected function automaticSeoMetaPayload(): array
    {
        $brandName = app(SeoService::class)->siteName();
        $rawTitle = $this->seoAutoTitle();
        $fullTitle = Str::contains(mb_strtolower($rawTitle), mb_strtolower($brandName))
            ? $rawTitle
            : "{$rawTitle} | {$brandName}";

        return [
            'title' => Str::limit($fullTitle, 70, ''),
            'deskripsi' => $this->seoAutoDescription() !== null
                ? Str::limit($this->seoAutoDescription(), 160, '')
                : null,
            'keyword' => $this->seoAutoKeywords(),
            'canonical_url' => $this->seoAutoCanonicalUrl(),
            'robots' => $this->seoAutoRobots(),
            'og_image' => $this->seoAutoOgImage(),
            'schema_json' => $this->seoAutoSchema(),
        ];
    }

    protected function seoAutoTitle(): string
    {
        foreach (['nama', 'judul', 'title'] as $field) {
            if (filled($this->{$field} ?? null)) {
                return trim((string) $this->{$field});
            }
        }

        return class_basename($this).' #'.$this->getKey();
    }

    protected function seoAutoDescription(): ?string
    {
        foreach (['deskripsi', 'konten'] as $field) {
            if (filled($this->{$field} ?? null)) {
                $clean = strip_tags((string) $this->{$field});
                $clean = html_entity_decode($clean, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                return trim(preg_replace('/\s+/u', ' ', $clean));
            }
        }

        if (filled($this->detail_produk ?? null)) {
            $value = $this->detail_produk;
            $clean = strip_tags(is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string) $value);

            return trim(preg_replace('/\s+/u', ' ', $clean));
        }

        return null;
    }

    protected function seoAutoKeywords(): ?string
    {
        $sourceText = $this->seoAutoTitle();

        if ($this instanceof Product && filled($this->sku ?? null)) {
            $sourceText .= ' '.$this->sku;
        }

        $words = preg_split('/[\s,\-\/]+/u', strip_tags($sourceText)) ?: [];
        $words = array_filter($words, fn ($word) => mb_strlen($word) > 2);
        $words = array_unique(array_map('mb_strtolower', $words));

        return $words !== [] ? implode(', ', array_slice(array_values($words), 0, 10)) : null;
    }

    protected function seoAutoRobots(): string
    {
        // Jika berita masih draft (published_at kosong atau di masa depan) -> noindex
        if ($this instanceof News) {
            if (empty($this->published_at) || $this->published_at->isFuture()) {
                return 'noindex, nofollow';
            }
        }

        // Jika model punya kolom is_active dan bernilai false -> noindex
        if (array_key_exists('is_active', $this->getAttributes()) && ! $this->is_active) {
            return 'noindex, nofollow';
        }

        return 'index, follow';
    }

    protected function seoAutoCanonicalUrl(): ?string
    {
        // Pastikan nama route di sini sama persis dengan ->name(...) di routes/web.php
        $routes = [
            Product::class => 'detail-product',
            News::class => 'detail-news',
            Page::class => 'page',
        ];

        // Kategori tidak punya halaman sendiri; canonical diarahkan ke katalog yang terfilter slug.
        if (static::class === Category::class && filled($this->slug ?? null)) {
            return route('product.category', ['category' => $this->slug]);
        }

        if (isset($routes[static::class]) && filled($this->slug ?? null)) {
            try {
                return route($routes[static::class], $this->slug);
            } catch (\Throwable $e) {
                // Fall through ke generic URL di bawah
            }
        }

        if (filled($this->slug ?? null)) {
            return url('/'.ltrim((string) $this->slug, '/'));
        }

        return rtrim(url('/'), '/');
    }

    protected function seoAutoOgImage(): ?string
    {
        foreach (['image', 'thumbnail', 'logo', 'images'] as $field) {
            if (! filled($this->{$field} ?? null)) {
                continue;
            }

            $value = $this->{$field};

            if (is_array($value)) {
                $value = $value[0] ?? null;
            }

            if (filled($value)) {
                return (string) $value;
            }
        }

        return null;
    }

    protected function seoAutoSchema(): ?array
    {
        $type = match (static::class) {
            Product::class => 'Product',
            News::class => 'NewsArticle',
            Category::class => 'CollectionPage',
            Page::class => 'WebPage',
            Profile::class => 'Organization',
            default => 'WebPage',
        };

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $this->seoAutoTitle(),
            'inLanguage' => 'id-ID',
        ];

        if ($description = $this->seoAutoDescription()) {
            $schema['description'] = Str::limit($description, 200, '');
        }

        if ($url = $this->seoAutoCanonicalUrl()) {
            $schema['url'] = $url;
        }

        if ($image = $this->seoAutoOgImage()) {
            // Ubah path storage relatif menjadi URL penuh untuk validasi Google Schema
            $schema['image'] = Str::startsWith($image, ['http://', 'https://'])
                ? $image
                : asset('storage/'.ltrim($image, '/'));
        }

        // Field spesifik agar lolos Rich Results Google
        if ($this instanceof Product) {
            if (filled($this->sku ?? null)) {
                $schema['sku'] = $this->sku;
            }

            if (filled($this->category?->nama ?? null)) {
                $schema['category'] = $this->category->nama;
            }

            $schema['brand'] = [
                '@type' => 'Brand',
                'name' => app(SeoService::class)->siteName(),
            ];
        } elseif ($this instanceof News) {
            $schema['headline'] = $this->seoAutoTitle();
            $schema['articleSection'] = 'News';
            $schema['author'] = [
                '@type' => 'Person',
                'name' => $this->author?->name ?? app(SeoService::class)->siteName(),
            ];
            $schema['publisher'] = [
                '@type' => 'Organization',
                'name' => app(SeoService::class)->siteName(),
            ];

            if ($url = $this->seoAutoCanonicalUrl()) {
                $schema['mainEntityOfPage'] = [
                    '@type' => 'WebPage',
                    '@id' => $url,
                ];
            }

            if ($this->published_at) {
                $schema['datePublished'] = $this->published_at->toIso8601String();
            }
            if ($this->updated_at) {
                $schema['dateModified'] = $this->updated_at->toIso8601String();
            }
        }

        return $schema;
    }

    /**
     * Helper untuk langsung menyuntikkan SEO ke artesaos/seotools dari Controller.
     * Pemakaian di Controller: $product->applySeo();
     */
    public function applySeo(): void
    {
        $seo = $this->seoMeta;
        $auto = $this->automaticSeoMetaPayload();
        $isManual = (bool) ($seo?->is_manual ?? false);

        $schema = ! $isManual || ! is_array($seo->schema_json)
            ? $auto['schema_json']
            : $seo->schema_json;

        $ogType = match (true) {
            $this instanceof Product => 'product',
            $this instanceof News => 'article',
            $this instanceof Profile => 'profile',
            default => 'website',
        };

        app(SeoService::class)->apply([
            'title' => (string) ($isManual ? ($seo->title ?: $auto['title']) : $auto['title']),
            'append_brand' => true,
            'description' => $isManual ? ($seo->deskripsi ?: $auto['deskripsi']) : $auto['deskripsi'],
            'canonical' => $isManual ? ($seo->canonical_url ?: $auto['canonical_url']) : $auto['canonical_url'],
            'robots' => $isManual ? ($seo->robots ?: $auto['robots']) : $auto['robots'],
            'image' => $isManual ? ($seo->og_image ?: $auto['og_image']) : $auto['og_image'],
            'keywords' => $isManual ? ($seo->keyword ?: $auto['keyword']) : $auto['keyword'],
            'og_type' => $ogType,
            'schema' => is_array($schema) ? $schema : null,
            'schema_type' => match (true) {
                $this instanceof Product => 'Product',
                $this instanceof News => 'NewsArticle',
                default => 'WebPage',
            },
        ]);

        if ($this instanceof News) {
            OpenGraph::setArticle(array_filter([
                'published_time' => $this->published_at?->toIso8601String(),
                'modified_time' => $this->updated_at?->toIso8601String(),
                'author' => $this->author?->name ?? app(SeoService::class)->siteName(),
                'section' => 'News',
            ]));
        }
    }
}
