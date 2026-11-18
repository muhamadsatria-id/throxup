<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
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
            ->paginate(12);

        $categories = Category::query()->orderBy('nama')->get();

        return view('pages.product', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $categorySlug,
            'search' => $search,
        ]);
    }

    public function show(string $slug)
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
