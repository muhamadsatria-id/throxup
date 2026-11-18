<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Services\SeoService;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __invoke(SeoService $seo): Response
    {
        $xml = app()->environment('testing')
            ? $this->build()
            : Cache::remember('sitemap.xml', now()->addHours(6), fn () => $this->build());

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    protected function build(): string
    {
        $urls = [];

        $urls[] = $this->entry(route('home'), now(), '1.0', 'daily');
        $urls[] = $this->entry(route('product'), Product::query()->max('updated_at'), '0.9', 'daily');
        $urls[] = $this->entry(route('news'), News::query()->max('updated_at'), '0.9', 'daily');
        $urls[] = $this->entry(route('about'), now(), '0.7', 'monthly');

        Category::query()
            ->orderBy('nama')
            ->cursor()
            ->each(function (Category $category) use (&$urls) {
                $urls[] = $this->entry(
                    route('product', ['category' => $category->slug]),
                    $category->updated_at,
                    '0.8',
                    'weekly',
                );
            });

        Product::query()
            ->where('is_active', true)
            ->orderBy('id')
            ->cursor()
            ->each(function (Product $product) use (&$urls) {
                $urls[] = $this->entry(
                    route('detail-product', $product->slug),
                    $product->updated_at,
                    '0.8',
                    'weekly',
                );
            });

        News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('id')
            ->cursor()
            ->each(function (News $article) use (&$urls) {
                $urls[] = $this->entry(
                    route('detail-news', $article->slug),
                    $article->updated_at,
                    '0.7',
                    'monthly',
                );
            });

        Page::query()
            ->where('is_active', true)
            ->orderBy('id')
            ->cursor()
            ->each(function (Page $page) use (&$urls) {
                $urls[] = $this->entry(
                    route('page', $page->slug),
                    $page->updated_at,
                    '0.5',
                    'yearly',
                );
            });

        return '<?xml version="1.0" encoding="UTF-8"?>'."\n"
            .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n"
            .implode("\n", $urls)."\n"
            .'</urlset>';
    }

    protected function entry(string $loc, mixed $lastmod = null, string $priority = '0.5', string $changefreq = 'monthly'): string
    {
        $lastmod = $lastmod instanceof Carbon
            ? $lastmod
            : ($lastmod ? Carbon::parse($lastmod) : now());

        return '  <url>'
            .'<loc>'.htmlspecialchars($loc, ENT_XML1 | ENT_QUOTES, 'UTF-8').'</loc>'
            .'<lastmod>'.$lastmod->toAtomString().'</lastmod>'
            .'<changefreq>'.$changefreq.'</changefreq>'
            .'<priority>'.$priority.'</priority>'
            .'</url>';
    }
}
