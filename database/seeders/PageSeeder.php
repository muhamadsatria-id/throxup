<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            [
                'Kebijakan Privasi',
                '<h2>Informasi yang Kami Kumpulkan</h2><p>Kami mengumpulkan data yang Anda kirimkan melalui formulir kontak dan permintaan penawaran, seperti nama, email, nomor telepon, serta spesifikasi proyek.</p><h2>Penggunaan Data</h2><p>Data tersebut digunakan untuk menindaklanjuti permintaan, mencocokkan spesifikasi part, dan menyusun penawaran. Kami tidak menjual data pribadi kepada pihak ketiga.</p>',
            ],
            [
                'Syarat & Ketentuan',
                '<h2>Penawaran Harga</h2><p>Harga dan ketersediaan part dapat berubah mengikuti kondisi stok dan kurs. Penawaran tertulis berlaku selama tujuh hari kerja sejak tanggal diterbitkan.</p><h2>Pengiriman</h2><p>Estimasi pengiriman disampaikan setelah konfirmasi Pembayaran atau purchase order. Waktu tempuh dapat berubah karena kondisi logistik di luar kendali kami.</p>',
            ],
            [
                'Garansi & Layanan Purna Jual',
                '<h2>Garansi Produk</h2><p>Komponen yang dibeli dari THORXup mendapat garansi sesuai ketentuan produsen. Klaim garansi diproses dengan menyertakan nomor seri part dan bukti pembelian.</p><h2>Dukungan Teknis</h2><p>Tim kami menyediakan konsultasi pemasangan dan diagnosa awal untuk membantu mengurangi waktu henti operasional.</p>',
            ],
            [
                'Karier',
                '<h2>Bergabung dengan Tim</h2><p>Kami mencari individu yang teliti, komunikatif, dan nyaman bekerja di lingkungan teknis. Kirimkan portofolio atau pengalaman kerja Anda melalui halaman kontak.</p><h2>Yang Kami Tawarkan</h2><p>Lingkungan kolaboratif, pelatihan produk berkelanjutan, serta kesempatan terlibat langsung dalam proyek alat berat nasional.</p>',
            ],
        ] as [$judul, $konten]) {
            Page::firstOrCreate(
                ['slug' => Str::slug($judul)],
                [
                    'judul' => $judul,
                    'konten' => $konten,
                    'is_active' => true,
                ],
            );
        }
    }
}
