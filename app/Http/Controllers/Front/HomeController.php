<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HeroCarousel;
use App\Models\News;
use App\Models\Platform;
use App\Models\Product;
use App\Services\SeoService;

class HomeController extends Controller
{
    public function index(SeoService $seo)
    {
        $heroCarousels = HeroCarousel::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $products = Product::query()
            ->where('is_active', true)
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $news = News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('author')
            ->latest('published_at')
            ->take(6)
            ->get();

        $platform = Platform::query()->first();
        $hero = $heroCarousels->first();

        $seo->apply([
            'title' => $seo->siteName().' — Heavy Machinery, Hydraulic Systems & Spare Parts',
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
