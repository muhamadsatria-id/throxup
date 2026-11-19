<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    public function run(): void
    {
        Platform::firstOrCreate(
            [],
            [
                'tiktok' => 'https://www.tiktok.com/@throxup',
                'facebook' => 'https://www.facebook.com/throxup',
                'instagram' => 'https://www.instagram.com/throxup',
                'shopee' => 'https://shopee.co.id/throxup',
                'tiktok_shop' => 'https://www.tiktok.com/@throxup/shop',
                'tokopedia' => 'https://www.tokopedia.com/throxup',
                'lazada' => 'https://www.lazada.co.id/throxup',
            ],
        );
    }
}
