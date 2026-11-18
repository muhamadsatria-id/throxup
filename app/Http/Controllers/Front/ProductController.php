<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\SeoService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, SeoService $seo)
    {
        $categorySlug = trim((string) $request->query('category', ''));
        $search = trim((string) $request->query('q', ''));

        $products = Product::query()
            ->where('is_active', true)
            ->with('category')
            ->when($categorySlug !== '', fn ($query) => $query->whereHas(
                'category',
                fn ($categoryQuery) => $categoryQuery->where('slug', $categorySlug)
            ))
            ->when($search !== '', fn ($query) => $query->where('nama', 'like', '%'.$search.'%'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::query()->orderBy('nama')->get();
        $activeCategory = $categories->firstWhere('slug', $categorySlug);

        $baseUrl = route('product', $activeCategory ? ['category' => $activeCategory->slug] : []);
        $canonical = $search !== ''
            ? $baseUrl
            : $request->fullUrlWithoutQuery(['q']);

        $pageTitle = match (true) {
            $search !== '' => 'Hasil pencarian "'.$search.'"',
            $activeCategory !== null => $activeCategory->nama.' — Katalog Produk',
            default => 'Katalog Produk & Suku Cadang Alat Berat',
        };

        $description = match (true) {
            $search !== '' => 'Hasil pencarian produk THORXup untuk "'.$search.'". Temukan suku cadang, sistem hidrolik, dan komponen alat berat yang sesuai.',
            $activeCategory !== null => $activeCategory->deskripsi
                ?: 'Katalog '.$activeCategory->nama.' pilihan THORXup untuk kebutuhan pertambangan, manufaktur, dan perawatan mesin industri.',
            default => 'Jelajahi katalog suku cadang OEM, sistem hidrolik, powertrain, dan ground engaging tools THORXup untuk operasi pertambangan dan manufaktur.',
        };

        $seo->apply([
            'title' => $pageTitle,
            'description' => $description,
            'canonical' => $canonical,
            'robots' => $search !== '' ? 'noindex, follow' : 'index, follow',
            'image' => $products->first()?->imageUrl(),
            'og_type' => 'website',
            'schema' => $seo->itemListSchema(
                $activeCategory?->nama ?? 'Katalog Produk THORXup',
                $products->getCollection()
                    ->map(fn (Product $product) => [
                        'name' => $product->nama,
                        'url' => route('detail-product', $product->slug),
                    ])
                    ->all(),
                $canonical,
            ),
        ]);

        return view('pages.product', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $categorySlug,
            'search' => $search,
        ]);
    }

    public function show(string $slug, SeoService $seo)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'seoMeta'])
            ->firstOrFail();

        $product->applySeo();

        $relatedProducts = Product::query()
            ->where('is_active', true)
            ->whereKeyNot($product->getKey())
            ->where('category_id', $product->category_id)
            ->latest()
            ->take(4)
            ->get();

        // Lengkapi slot produk terkait dengan produk aktif lain bila kategori sama kurang dari 4.
        if ($relatedProducts->count() < 4) {
            $excludedIds = $relatedProducts->pluck('id')
                ->push($product->getKey())
                ->all();

            $relatedProducts = $relatedProducts->concat(
                Product::query()
                    ->where('is_active', true)
                    ->whereKeyNot($excludedIds)
                    ->latest()
                    ->take(4 - $relatedProducts->count())
                    ->get()
            );
        }

        return view('pages.detail-product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
