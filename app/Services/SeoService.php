<?php

namespace App\Services;

use App\Models\HeroCarousel;
use App\Models\Platform;
use App\Models\Profile;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SeoService
{
    public const FALLBACK_DESCRIPTION = 'THORXup menyediakan heavy machinery, hydraulic systems, powertrain, dan spare parts industri untuk pertambangan dan manufaktur di Indonesia.';

    public const FALLBACK_OG_IMAGE = 'images/og-default.png';

    /**
     * Terapkan metadata SEO utama untuk satu halaman.
     *
     * @param  array{
     *     title?: string,
     *     append_brand?: bool,
     *     description?: string|null,
     *     canonical?: string|null,
     *     robots?: string,
     *     image?: string|null,
     *     keywords?: array<int, string>|string|null,
     *     og_type?: string,
     *     schema?: array<string, mixed>|null,
     *     schema_type?: string
     * }  $data
     */
    public function apply(array $data): void
    {
        $title = trim((string) ($data['title'] ?? $this->siteName()));
        $appendBrand = (bool) ($data['append_brand'] ?? true);

        if ($appendBrand) {
            $title = $this->titleWithBrand($title);
        }

        $description = $this->cleanDescription($data['description'] ?? $this->siteDescription());
        $canonical = $this->canonicalUrl($data['canonical'] ?? null);
        $robots = trim((string) ($data['robots'] ?? 'index, follow'));
        $image = $this->absoluteMedia($data['image'] ?? $this->defaultImage());
        $ogType = trim((string) ($data['og_type'] ?? 'website'));

        SEOTools::setTitle($title, false);
        SEOTools::setDescription($description);
        SEOTools::setCanonical($canonical);
        SEOMeta::setRobots($robots);

        if (filled($data['keywords'] ?? null)) {
            $keywords = is_array($data['keywords'])
                ? $data['keywords']
                : array_filter(array_map('trim', explode(',', (string) $data['keywords'])));

            if ($keywords !== []) {
                SEOMeta::setKeywords($keywords);
            }
        }

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($canonical);
        OpenGraph::setType($ogType);
        OpenGraph::setSiteName($this->siteName());
        OpenGraph::addProperty('locale', 'id_ID');

        TwitterCard::setType('summary_large_image');
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setUrl($canonical);

        if (filled($image)) {
            OpenGraph::addImage($image);
            OpenGraph::addProperty('image:alt', $title);
            TwitterCard::setImage($image);
        }

        $schema = $data['schema'] ?? null;

        if (is_array($schema) && $schema !== []) {
            $this->fillSchema($schema, $title, $description, $canonical);
        } else {
            JsonLdMulti::setType((string) ($data['schema_type'] ?? 'WebPage'));
            JsonLdMulti::setTitle($title);
            JsonLdMulti::setDescription($description);
            JsonLdMulti::setUrl($canonical);
        }
    }

    /**
     * Tambahkan satu blok JSON-LD tambahan (Organization, WebSite, ItemList, dll).
     *
     * @param  array<string, mixed>  $schema
     */
    public function addSchema(array $schema): void
    {
        JsonLdMulti::newJsonLd();

        $this->fillSchema(
            $schema,
            (string) ($schema['name'] ?? $this->siteName()),
            (string) ($schema['description'] ?? $this->siteDescription()),
            (string) ($schema['url'] ?? $this->siteUrl()),
        );
    }

    /**
     * @param  array<string, mixed>  $schema
     */
    protected function fillSchema(array $schema, string $title, string $description, string $canonical): void
    {
        if (isset($schema['@type'])) {
            JsonLdMulti::setType((string) $schema['@type']);
        }

        JsonLdMulti::setTitle((string) ($schema['name'] ?? $schema['headline'] ?? $title));
        JsonLdMulti::setDescription((string) ($schema['description'] ?? $description));
        JsonLdMulti::setUrl((string) ($schema['url'] ?? $canonical));

        foreach ($schema as $key => $value) {
            if (in_array($key, ['@context', '@type', 'name', 'description', 'url'], true)) {
                continue;
            }

            if ($value !== null) {
                JsonLdMulti::addValue($key, $value);
            }
        }
    }

    public function titleWithBrand(string $title, int $limit = 65): string
    {
        $title = trim($title);
        $brand = $this->siteName();

        if ($title === '') {
            return $brand;
        }

        if (Str::contains(mb_strtolower($title), mb_strtolower($brand))) {
            return Str::limit($title, $limit, '');
        }

        $suffix = ' | '.$brand;
        $baseLimit = max(10, $limit - mb_strlen($suffix));

        return Str::limit($title, $baseLimit, '').$suffix;
    }

    public function cleanDescription(?string $description): string
    {
        $description = html_entity_decode(strip_tags((string) $description), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $description = trim(preg_replace('/\s+/u', ' ', $description) ?? '');

        return Str::limit($description !== '' ? $description : self::FALLBACK_DESCRIPTION, 160, '');
    }

    public function canonicalUrl(?string $url = null): string
    {
        if (filled($url)) {
            return (string) $url;
        }

        return url()->current();
    }

    public function absoluteMedia(?string $path): ?string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, ['images/', 'build/', 'favicon'])) {
            return asset($path);
        }

        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        return asset('storage/'.ltrim($path, '/'));
    }

    public function siteName(): string
    {
        $name = trim((string) data_get($this->profile(), 'nama', ''));

        return $name !== '' ? Str::headline($name) : 'THORXup';
    }

    public function siteDescription(): string
    {
        return $this->cleanDescription(data_get($this->profile(), 'deskripsi'));
    }

    public function siteUrl(): string
    {
        return rtrim(url('/'), '/');
    }

    public function defaultImage(): string
    {
        $logo = data_get($this->profile(), 'logo');

        if (filled($logo)) {
            return (string) $this->absoluteMedia($logo);
        }

        $heroImage = $this->remember('seo_default_image', function () {
            if (! Schema::hasTable('hero_carousels')) {
                return null;
            }

            return HeroCarousel::query()
                ->where('is_active', true)
                ->orderBy('order')
                ->value('image');
        });

        if (filled($heroImage)) {
            return (string) $this->absoluteMedia($heroImage);
        }

        return asset(self::FALLBACK_OG_IMAGE);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function profile(): ?array
    {
        return $this->remember('site_profile', function () {
            if (! Schema::hasTable('profiles')) {
                return null;
            }

            return Profile::query()->first()?->toArray();
        });
    }

    /**
     * @return array<string, mixed>|null
     */
    public function platform(): ?array
    {
        return $this->remember('site_platform', function () {
            if (! Schema::hasTable('platforms')) {
                return null;
            }

            return Platform::query()->first()?->toArray();
        });
    }

    /**
     * @return array<string, mixed>
     */
    public function organizationSchema(): array
    {
        $profile = $this->profile();
        $siteUrl = $this->siteUrl();

        $sameAs = collect(['tiktok', 'facebook', 'instagram', 'shopee', 'tiktok_shop', 'tokopedia', 'lazada'])
            ->map(fn (string $key) => data_get($this->platform(), $key))
            ->filter(fn ($url) => filled($url) && Str::startsWith((string) $url, ['http://', 'https://']))
            ->unique()
            ->values()
            ->all();

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => $siteUrl.'#organization',
            'name' => $this->siteName(),
            'url' => $siteUrl,
            'description' => $this->siteDescription(),
        ];

        if ($logo = data_get($profile, 'logo')) {
            $schema['logo'] = $this->absoluteMedia($logo);
        }

        if ($email = data_get($profile, 'email')) {
            $schema['email'] = $email;
        }

        if ($phone = data_get($profile, 'phone')) {
            $schema['telephone'] = $phone;
        }

        if ($address = data_get($profile, 'address')) {
            $schema['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => $address,
                'addressCountry' => 'ID',
            ];
        }

        if ($sameAs !== []) {
            $schema['sameAs'] = $sameAs;
        }

        return $schema;
    }

    /**
     * @return array<string, mixed>
     */
    public function websiteSchema(): array
    {
        $siteUrl = $this->siteUrl();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => $siteUrl.'#website',
            'name' => $this->siteName(),
            'url' => $siteUrl,
            'description' => $this->siteDescription(),
            'inLanguage' => 'id-ID',
            'publisher' => [
                '@id' => $siteUrl.'#organization',
            ],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => route('product').'?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }

    /**
     * @param  array<int, array{url: string, name?: string|null}>  $items
     * @return array<string, mixed>
     */
    public function itemListSchema(string $name, array $items, ?string $url = null): array
    {
        $url = $url ?? url()->current();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $name,
            'url' => $url,
            'inLanguage' => 'id-ID',
            'isPartOf' => [
                '@id' => $this->siteUrl().'#website',
            ],
            'mainEntity' => [
                '@type' => 'ItemList',
                'name' => $name,
                'url' => $url,
                'numberOfItems' => count($items),
                'itemListElement' => collect($items)
                    ->values()
                    ->map(fn (array $item, int $index) => array_filter([
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'name' => $item['name'] ?? null,
                        'url' => $item['url'] ?? null,
                    ], fn ($value) => ! is_null($value) && $value !== ''))
                    ->all(),
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function aboutPageSchema(string $name, ?string $description = null): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => $name,
            'description' => $description ?? $this->siteDescription(),
            'url' => route('about'),
            'inLanguage' => 'id-ID',
            'isPartOf' => [
                '@id' => $this->siteUrl().'#website',
            ],
            'about' => [
                '@id' => $this->siteUrl().'#organization',
            ],
        ];
    }

    public static function flush(): void
    {
        foreach (['site_profile', 'site_platform', 'seo_default_image', 'sitemap.xml'] as $key) {
            Cache::forget($key);
        }
    }

    public static function flushSitemap(): void
    {
        Cache::forget('sitemap.xml');
    }

    protected function remember(string $key, \Closure $callback): mixed
    {
        if (app()->environment('testing')) {
            return $callback();
        }

        return Cache::rememberForever($key, $callback);
    }
}
