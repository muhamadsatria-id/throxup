<?php

namespace Database\Seeders;

use App\Models\ModalBanner;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class ModalBannerSeeder extends Seeder
{
    public function run(): void
    {
        ModalBanner::updateOrCreate(
            ['title' => 'Katalog Produk Pertambangan'],
            [
                'image' => DummyImage::make('modal-banners', 'katalog', 'Katalog Produk Pertambangan', 1000, 700),
                'link_url' => '/product',
                'is_active' => true,
            ],
        );
    }
}
