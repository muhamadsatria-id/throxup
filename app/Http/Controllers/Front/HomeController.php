<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HeroCarousel;
use App\Models\News;
use App\Models\Platform;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
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
            ->with('author')
            ->latest('published_at')
            ->take(6)
            ->get();

        $platform = Platform::query()->first();

        return view('pages.home', [
            'heroCarousels' => $heroCarousels,
            'products' => $products,
            'news' => $news,
            'platform' => $platform,
        ]);
    }
}
