<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::firstOrCreate(
            [],
            [
                'nama' => 'THORXup',
                'deskripsi' => 'THORXup adalah penyedia komponen mesin berat dan assembly replacement yang diuji di lapangan untuk kebutuhan alat berat konstruksi, pertambangan, dan logistik. Kami menggabungkan pengalaman teknis dengan rantai pasok yang responsif.',
                'vision' => 'Menjadi mitra andal untuk keandalan alat berat di Indonesia melalui komponen presisi dan layanan teknis yang cepat.',
                'mission' => [
                    'Menyediakan spare part berkualitas dengan spesifikasi terverifikasi.',
                    'Memberikan konsultasi teknis sebelum dan sesudah pembelian.',
                    'Menjaga ketersediaan stok dan kecepatan pengiriman ke lokasi proyek.',
                    'Membangun hubungan jangka panjang berbasis kepercayaan dan data.',
                ],
                'email' => 'hello@throxup.test',
                'phone' => '+62 21 5550 1234',
                'whatsapp' => '6281234567890',
                'address' => 'Jalan Industri Raya No. 88, Kawasan Pabrik Cibitung, Bekasi, Jawa Barat',
                'logo' => DummyImage::make('profiles', 'logo', 'THORXup', 512, 512),
                'favicon' => null,
            ],
        );
    }
}
