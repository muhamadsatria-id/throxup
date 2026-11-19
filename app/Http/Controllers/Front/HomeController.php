<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HeroCarousel;
use App\Models\News;
use App\Models\Platform;
use App\Models\Product;
use App\Services\SeoService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(SeoService $seo)
    {
        $heroCarousels = Cache::remember('home_hero_carousels', 300, fn () => HeroCarousel::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get());

        $products = Cache::remember('home_featured_products', 300, fn () => Product::query()
            ->where('is_active', true)
            ->with('category')
            ->latest()
            ->take(8)
            ->get());

        $news = Cache::remember('home_latest_news', 300, fn () => News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('author')
            ->latest('published_at')
            ->take(6)
            ->get());

        $platform = Platform::query()->first();
        $hero = $heroCarousels->first();

        $seo->apply([
            'title' => 'THORXup — Heavy Machinery & Hydraulic Spare Parts',
            'append_brand' => false,
            'description' => 'THORXup menghadirkan heavy machinery, hydraulic systems, powertrain, dan spare parts industri untuk operasi pertambangan dan manufaktur di Indonesia.',
            'canonical' => route('home'),
            'image' => $hero?->image,
            'og_type' => 'website',
            'schema' => $seo->websiteSchema(),
        ]);

        $seo->addSchema($seo->organizationSchema());

        return view('pages.home', [
            'heroCarousels' => $heroCarousels,
            'products' => $products,
            'news' => $news,
            'platform' => $platform,
        ]);
    }
}
