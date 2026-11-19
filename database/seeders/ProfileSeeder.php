<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array{about: array<string, mixed>} $catalogue */
        $catalogue = require database_path('data/catalogue.php');
        $about = $catalogue['about'];

        Profile::updateOrCreate(
            [],
            [
                'nama' => 'THORXup',
                'deskripsi' => 'Providing reliable mining products and solutions that enhance productivity, operational efficiency, and long-term performance. Core values: '.$about['core_values'],
                'vision' => $about['vision'],
                'mission' => $about['mission'],
                'email' => 'hello@thorx.up',
                'phone' => '+62 21 5550 1234',
                'whatsapp' => '6281234567890',
                'address' => 'Jalan Industri Raya No. 88, Kawasan Pabrik Cibitung, Bekasi, Jawa Barat',
                'logo' => DummyImage::make('profiles', 'logo', 'THORXup', 512, 512),
                'favicon' => null,
            ],
        );
    }
}
