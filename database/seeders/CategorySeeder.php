<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Menanamkan tujuh kategori katalog dari docs/data.txt.
     */
    public function run(): void
    {
        /** @var array{categories: array<int, array<string, mixed>>} $catalogue */
        $catalogue = require database_path('data/catalogue.php');

        foreach ($catalogue['categories'] as $item) {
            Category::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'nama' => $item['nama'],
                    'deskripsi' => $item['deskripsi'],
                    'image' => DummyImage::make('categories', $item['slug'], $item['nama'], 900, 600),
                ],
            );
        }
    }
}
