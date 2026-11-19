<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Script kosong sengaja disimpan null agar tidak ada teks sampah yang
     * ter-render langsung dari blade layout.
     */
    public function run(): void
    {
        Setting::firstOrCreate(
            [],
            [
                'ga4_code' => null,
                'gtm_head_code' => null,
                'gtm_body_code' => null,
                'gsc_verification' => null,
                'custom_head_scripts' => null,
                'custom_body_scripts' => null,
            ],
        );
    }
}
