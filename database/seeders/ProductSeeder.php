<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Mengisi seluruh 131 produk katalog dari docs/data.txt.
     */
    public function run(): void
    {
        /** @var array{categories: array<int, array<string, mixed>>} $catalogue */
        $catalogue = require database_path('data/catalogue.php');

        $categoryIds = Category::query()
            ->whereIn('slug', array_column($catalogue['categories'], 'slug'))
            ->pluck('id', 'slug');

        $slugCounts = [];

        foreach ($catalogue['categories'] as $category) {
            foreach ($category['products'] as $index => $product) {
                $sku = sprintf('TH-%s-%03d', $category['kode'], $index + 1);
                $baseSlug = Str::slug($category['slug'].' '.$product['nama']);
                $slugCounts[$baseSlug] = ($slugCounts[$baseSlug] ?? 0) + 1;
                $slug = $slugCounts[$baseSlug] === 1
                    ? $baseSlug
                    : $baseSlug.'-'.$slugCounts[$baseSlug];

                Product::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'category_id' => $categoryIds[$category['slug']],
                        'nama' => $product['nama'],
                        'sku' => $sku,
                        'deskripsi' => $product['deskripsi'],
                        'benefits' => [],
                        'detail_produk' => self::detailHtml(
                            $product['nama'],
                            $product['deskripsi'],
                            $category['nama'],
                        ),
                        'images' => [
                            DummyImage::make(
                                'products',
                                $sku,
                                $category['nama'].' '.$product['nama'],
                                1200,
                                900,
                            ),
                        ],
                        'is_active' => true,
                    ],
                );
            }
        }
    }

    protected static function detailHtml(string $nama, string $deskripsi, string $kategori): string
    {
        return '<h4>'.e($nama).'</h4>'
            .'<p>'.e($deskripsi).'</p>'
            .'<p><strong>Kategori:</strong> '.e($kategori).'</p>';
    }
}
