<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Support\DummyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::query()->pluck('id', 'slug');

        foreach ([
            [
                'nama' => 'Hydraulic Pump Assembly',
                'sku' => 'TH-HYD-101',
                'category' => 'hydraulic-systems',
                'deskripsi' => 'Pompa hidrolik assembly dengan kapasitas aliran stabil untuk excavator kelas menengah. Dikirim dalam kondisi siap pasang setelah uji tekanan.',
                'benefits' => ['Aliran stabil pada beban tinggi', 'Diuji tekanan sebelum pengiriman', 'Kompatibel dengan housing standar'],
                'specs' => ['Tipe' => 'Variable displacement piston pump', 'Aliran' => '180 L/min', 'Tekanan kerja' => '350 bar'],
            ],
            [
                'nama' => 'Main Control Valve',
                'sku' => 'TH-HYD-102',
                'category' => 'hydraulic-systems',
                'deskripsi' => 'Katup kontrol utama dengan tujuh spool untuk mengatur pergerakan boom, arm, bucket, dan travel secara presisi.',
                'benefits' => ['Respons spool cepat', 'Kebocoran internal rendah', 'Port servis mudah diakses'],
                'specs' => ['Jumlah spool' => '7', 'Tekanan maksimal' => '345 bar', 'Berat' => '84 kg'],
            ],
            [
                'nama' => 'Hydraulic Cylinder Seal Kit',
                'sku' => 'TH-HYD-103',
                'category' => 'hydraulic-systems',
                'deskripsi' => 'Paket seal silinder hidrolik dengan material tahan abrasi untuk siklus kerja berat di lapangan pertambangan.',
                'benefits' => ['Umur pakai panjang', 'Mengurangi kebocoran', 'Hemat waktu perawatan'],
                'specs' => ['Material' => 'PU + PTFE', 'Suhu kerja' => '-20°C hingga 110°C', 'Diameter piston' => '120 mm'],
            ],
            [
                'nama' => 'Turbocharger Cartridge',
                'sku' => 'TH-PWR-201',
                'category' => 'powertrain-engines',
                'deskripsi' => 'Cartridge turbocharger yang diseimbangkan dinamis untuk mengembalikan tenaga mesin diesel tanpa mengganti unit penuh.',
                'benefits' => ['Keseimbangan dinamis terverifikasi', 'Pemasangan lebih cepat', 'Efisiensi bahan bakar lebih baik'],
                'specs' => ['Tipe' => 'Single variable geometry', 'Arah putar' => 'Clockwise', 'Kondisi' => 'Remanufactured'],
            ],
            [
                'nama' => 'Transmission Gear Set',
                'sku' => 'TH-PWR-202',
                'category' => 'powertrain-engines',
                'deskripsi' => 'Set gigi transmisi dengan perlakuan permukaan keras untuk perpindahan halus pada beban torsi tinggi.',
                'benefits' => ['Permukaan gerigi hardened', 'Noise lebih rendah', 'Presisi sesuai OE'],
                'specs' => ['Jumlah gigi' => '28 / 42', 'Material' => 'Alloy steel 20CrMnTi', 'Torsi' => '1.800 Nm'],
            ],
            [
                'nama' => 'Engine Mount Kit',
                'sku' => 'TH-PWR-203',
                'category' => 'powertrain-engines',
                'deskripsi' => 'Kit dudukan mesin yang meredam getaran dan menjaga alignment mesin tetap stabil saat beban berubah.',
                'benefits' => ['Getaran lebih rendah', 'Braket anti-karat', 'Set lengkap 4 titik'],
                'specs' => ['Material' => 'Karet NR + baja', 'Jumlah titik' => '4', 'Kekerasan' => '65 Shore A'],
            ],
            [
                'nama' => 'Track Shoe Assembly',
                'sku' => 'TH-UNC-301',
                'category' => 'undercarriage',
                'deskripsi' => 'Sepatu track dengan lug berprofil dalam untuk traksi optimal di medan lumpur dan batuan.',
                'benefits' => ['Traksi kuat di medan licin', 'Baja tahan aus', 'Baut dan nut termasuk'],
                'specs' => ['Lebar' => '600 mm', 'Pitch' => '216 mm', 'Material' => 'Mn13'],
            ],
            [
                'nama' => 'Final Drive Motor',
                'sku' => 'TH-UNC-302',
                'category' => 'undercarriage',
                'deskripsi' => 'Motor final drive dengan gear reduction presisi untuk penggerak track yang halus dan responsif.',
                'benefits' => ['Rasio reduksi akurat', 'Segel tahan kontaminasi', 'Siap pasang'],
                'specs' => ['Rasio' => '1:48', 'Torsi keluar' => '9.500 Nm', 'Berat' => '132 kg'],
            ],
            [
                'nama' => 'Excavator Bucket 1.2 m3',
                'sku' => 'TH-ATT-401',
                'category' => 'attachments',
                'deskripsi' => 'Bucket excavator kapasitas 1,2 m³ dengan gigi tahan aus untuk penggalian tanah keras dan material lepas.',
                'benefits' => ['Kapasitas optimal', 'Gigi mudah diganti', 'Plate tebal tahan deformasi'],
                'specs' => ['Kapasitas' => '1.2 m³', 'Lebar' => '1.200 mm', 'Berat' => '980 kg'],
            ],
            [
                'nama' => 'Hydraulic Breaker',
                'sku' => 'TH-ATT-402',
                'category' => 'attachments',
                'deskripsi' => 'Breaker hidrolik untuk pemecahan beton dan batu dengan energi impact konsisten pada aliran standar.',
                'benefits' => ['Energi impact stabil', 'Sistem reduksi noise', 'Chisel included'],
                'specs' => ['Energi' => '1.800 J', 'Diameter chisel' => '135 mm', 'Aliran' => '120 L/min'],
            ],
            [
                'nama' => 'High-Flow Hydraulic Filter',
                'sku' => 'TH-FIL-501',
                'category' => 'filtration-consumables',
                'deskripsi' => 'Filter hidrolik high-flow dengan media multilayer untuk menjaga kebersihan oli pada siklus kerja panjang.',
                'benefits' => ['Efisiensi filtrasi tinggi', 'Kapasitas kotoran besar', 'Indikator tekanan tersedia'],
                'specs' => ['Micro rating' => '10 µm', 'Aliran' => '160 L/min', 'Tekanan' => '25 bar'],
            ],
            [
                'nama' => 'Electrical Control Module',
                'sku' => 'TH-ELE-601',
                'category' => 'electrical-controls',
                'deskripsi' => 'Modul kontrol elektronik dengan housing tahan getar untuk mengganti unit ECU yang mengalami gangguan sinyal.',
                'benefits' => ['Housing tahan getar', 'Plug-and-play', 'Diagnostik cepat'],
                'specs' => ['Tegangan' => '24 V DC', 'Protokol' => 'CAN J1939', 'IP rating' => 'IP67'],
            ],
        ] as $item) {
            $images = collect(range(1, 3))
                ->map(fn (int $index) => DummyImage::make(
                    'products',
                    $item['sku'].'-'.$index,
                    $item['nama'].' '.$index,
                    1200,
                    900,
                ))
                ->all();

            Product::firstOrCreate(
                ['sku' => $item['sku']],
                [
                    'category_id' => $categoryIds[$item['category']],
                    'nama' => $item['nama'],
                    'slug' => Str::slug($item['nama']),
                    'deskripsi' => $item['deskripsi'],
                    'benefits' => $item['benefits'],
                    'detail_produk' => self::detailHtml($item['nama'], $item['specs']),
                    'images' => $images,
                    'is_active' => true,
                ],
            );
        }
    }

    /**
     * @param  array<string, string>  $specs
     */
    protected static function detailHtml(string $nama, array $specs): string
    {
        $rows = collect($specs)
            ->map(fn ($value, $key) => '<li><strong>'.e((string) $key).':</strong> '.e((string) $value).'</li>')
            ->implode('');

        return '<h4>Spesifikasi '.e($nama).'</h4><ul>'.$rows.'</ul>'
            .'<p>Untuk pencocokan part sebelum pemesanan, sertakan nomor seri unit dan foto nameplate pada permintaan penawaran.</p>';
    }
}
