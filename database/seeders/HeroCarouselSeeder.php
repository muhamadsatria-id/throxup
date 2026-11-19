<?php

namespace Database\Seeders;

use App\Models\HeroCarousel;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class HeroCarouselSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array{categories: array<int, array<string, mixed>>} $catalogue */
        $catalogue = require database_path('data/catalogue.php');

        $slides = collect($catalogue['categories'])
            ->take(3)
            ->map(fn (array $category, int $index) => [
                'judul' => $category['nama'],
                'deskripsi' => $category['deskripsi'],
                'button_text' => 'Lihat Produk',
                'button_url' => '/product/category/'.$category['slug'],
                'order' => $index + 1,
                'image' => DummyImage::make(
                    'hero-carousels',
                    'hero-'.$category['slug'],
                    $category['nama'],
                    1600,
                    700,
                ),
                'is_active' => true,
            ]);

        foreach ($slides as $item) {
            HeroCarousel::updateOrCreate(
                ['judul' => $item['judul']],
                $item,
            );
        }
    }
}
