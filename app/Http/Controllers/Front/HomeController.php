<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HeroCarousel;
use App\Models\News;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Services\SeoService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(SeoService $seo)
    {
        $heroData = Cache::remember('home_hero_carousels_v2', 300, fn () => HeroCarousel::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->toArray());
        $heroCarousels = HeroCarousel::hydrate($heroData);

        $productData = Cache::remember('home_featured_products_v2', 300, fn () => Product::query()
            ->where('is_active', true)
            ->with('category')
            ->latest()
            ->take(8)
            ->get()
            ->toArray());
        $productData = array_map(function (array $product) {
            $product['benefits'] = json_encode($product['benefits'] ?? [], JSON_THROW_ON_ERROR);
            $product['images'] = json_encode($product['images'] ?? [], JSON_THROW_ON_ERROR);

            return $product;
        }, $productData);
        $products = Product::hydrate($productData);
        $products->each(function (Product $product) {
            $category = $product->getAttribute('category');
            $product->setRelation(
                'category',
                $category ? Category::hydrate([$category])->first() : null
            );
        });

        $newsData = Cache::remember('home_latest_news_v2', 300, fn () => News::query()
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('author')
            ->latest('published_at')
            ->take(6)
            ->get()
            ->toArray());
        $news = News::hydrate($newsData);
        $news->each(function (News $article) {
            $author = $article->getAttribute('author');
            $article->setRelation(
                'author',
                $author ? User::hydrate([$author])->first() : null
            );
        });

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
