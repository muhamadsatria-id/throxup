<?php

namespace Database\Seeders;

use App\Models\HeroCarousel;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class HeroCarouselSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            [
                'judul' => 'Komponen Alat Berat Siap Pakai',
                'deskripsi' => 'Assembly replacement yang diuji lapangan untuk excavator, wheel loader, dan bulldozer. Stok tersedia untuk pengiriman cepat ke lokasi proyek.',
                'button_text' => 'Lihat Katalog',
                'button_url' => '/product',
                'order' => 1,
            ],
            [
                'judul' => 'Presisi yang Menjaga Uptime',
                'deskripsi' => 'Setiap unit melewati pemeriksaan dimensi dan uji beban sebelum dikirim, sehingga mesin Anda kembali bekerja lebih cepat.',
                'button_text' => 'Konsultasi Teknis',
                'button_url' => '/#contact',
                'order' => 2,
            ],
            [
                'judul' => 'Partner Rantai Pasok Andal',
                'deskripsi' => 'Dari unit tunggal sampai kebutuhan fleet, kami bantu mencocokkan spesifikasi, ketersediaan, dan estimasi pengiriman.',
                'button_text' => 'Baca Artikel',
                'button_url' => '/news',
                'order' => 3,
            ],
        ] as $index => $item) {
            HeroCarousel::firstOrCreate(
                ['judul' => $item['judul']],
                $item + [
                    'image' => DummyImage::make('hero-carousels', 'hero-'.($index + 1), $item['judul'], 1600, 700),
                    'is_active' => true,
                ],
            );
        }
    }
}
