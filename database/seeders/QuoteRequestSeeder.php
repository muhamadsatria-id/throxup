<?php

namespace Database\Seeders;

use App\Models\QuoteRequest;
use Illuminate\Database\Seeder;

class QuoteRequestSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            [
                'full_name' => 'Rizky Pratama',
                'business_email' => 'rizky@kontraktor.test',
                'phone_number' => '081234567001',
                'subject' => 'Pengadaan hydraulic pump untuk fleet excavator',
                'project_specifications' => 'Membutuhkan 4 unit hydraulic pump assembly untuk excavator kelas 20 ton. Mohon dikirimkan spesifikasi dan estimasi pengiriman ke site Bekasi.',
                'status' => 'pending',
                'admin_notes' => null,
            ],
            [
                'full_name' => 'Dewi Anggraini',
                'business_email' => 'dewi@mining.test',
                'phone_number' => '081234567002',
                'subject' => 'Track shoe untuk unit bulldozer',
                'project_specifications' => 'Permintaan 120 pcs track shoe width 600 mm untuk bulldozer D6. Diminta penawaran harga grosir dan jadwal produksi.',
                'status' => 'reviewed',
                'admin_notes' => 'Menunggu konfirmasi specs nameplate dari customer.',
            ],
            [
                'full_name' => 'Agus Setiawan',
                'business_email' => 'agus@logistik.test',
                'phone_number' => '081234567003',
                'subject' => 'Service kit rutin 500 jam',
                'project_specifications' => 'Paket filter dan seal untuk 6 unit wheel loader dengan interval servis 500 jam operasi.',
                'status' => 'replied',
                'admin_notes' => 'Penawaran dikirim via email.',
            ],
        ] as $item) {
            QuoteRequest::firstOrCreate(
                ['business_email' => $item['business_email'], 'subject' => $item['subject']],
                $item,
            );
        }
    }
}
