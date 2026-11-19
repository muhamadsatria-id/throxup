<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['Hydraulic Systems', 'Komponen hidrolik untuk kontrol gerak dan daya alat berat.'],
            ['Powertrain & Engines', 'Mesin, transmisi, dan komponen penggerak untuk berbagai tipe unit.'],
            ['Undercarriage', 'Track, roller, sprocket, dan shoe untuk stabilitas di medan berat.'],
            ['Attachments', 'Bucket, breaker, dan attachment spesifik untuk kebutuhan lapangan.'],
            ['Filtration & Consumables', 'Filter, seal, dan consumable pendukung perawatan rutin.'],
            ['Electrical & Controls', 'Sensor, kabel, dan modul kontrol untuk sistem elektronik alat berat.'],
            ['Structural Components', 'Frame, boom, dan komponen struktural untuk kebutuhan replacement.'],
            ['Service Kits', 'Paket perawatan lengkap yang disusun per interval jam operasi.'],
        ] as [$nama, $deskripsi]) {
            $slug = Str::slug($nama);

            Category::firstOrCreate(
                ['slug' => $slug],
                [
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'image' => DummyImage::make('categories', $slug, $nama, 900, 600),
                ],
            );
        }
    }
}
