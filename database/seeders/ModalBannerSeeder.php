<?php

namespace Database\Seeders;

use App\Models\ModalBanner;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class ModalBannerSeeder extends Seeder
{
    public function run(): void
    {
        ModalBanner::firstOrCreate(
            ['title' => 'Promo Service Kit Perdana'],
            [
                'image' => DummyImage::make('modal-banners', 'service-kit', 'Service Kit Perdana', 1000, 700),
                'link_url' => '/product',
                'is_active' => true,
            ],
        );
    }
}
