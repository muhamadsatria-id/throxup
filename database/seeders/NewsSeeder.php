<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $authorId = User::query()->where('email', 'admin@thorx.up')->value('id')
            ?? User::query()->value('id');

        foreach ([
            ['Panduan Memilih Spare Part Alat Berat', 'Memilih komponen replacement tidak hanya soal kecocokan dimensi. Simak kriteria teknis yang perlu dicek sebelum pemesanan.'],
            ['5 Tanda Hidrolik Perlu Servis', 'Penurunan respons boom dan suara abnormal bisa menjadi indikator awal gangguan sistem hidrolik.'],
            ['Menjaga Uptime Fleet di Musim Hujan', 'Perawatan undercarriage dan filtrasi menjadi prioritas saat intensitas kerja lapangan meningkat.'],
            ['Perbandingan Seal OEM dan Aftermarket', 'Memahami perbedaan material seal membantu menentukan pilihan yang tepat untuk siklus kerja Anda.'],
            ['Tips Inspeksi Track Shoe Sebelum Operasi', 'Pemeriksaan singkat setiap pagi dapat mencegah keausan track yang lebih mahal di kemudian hari.'],
            ['Alur Pengajuan Penawaran Proyek', 'Kami merangkum langkah dari pengiriman spesifikasi hingga konfirmasi pengiriman untuk kebutuhan fleet.'],
        ] as $index => [$judul, $deskripsi]) {
            $slug = Str::slug($judul);

            News::firstOrCreate(
                ['slug' => $slug],
                [
                    'user_id' => $authorId,
                    'judul' => $judul,
                    'thumbnail' => DummyImage::make('news', $slug, $judul, 1200, 675),
                    'deskripsi' => '<p>'.$deskripsi.'</p><p>Tim teknis THORXup siap membantu pencocokan spesifikasi dan estimasi pengiriman sesuai kondisi lapangan Anda.</p>',
                    'published_at' => now()->subDay()->subDays($index * 4)->setTime(9, 0),
                ],
            );
        }
    }
}
