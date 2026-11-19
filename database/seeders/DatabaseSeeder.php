<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            PlatformSeeder::class,
            SettingSeeder::class,
            HeroCarouselSeeder::class,
            ModalBannerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            NewsSeeder::class,
            PageSeeder::class,
            QuoteRequestSeeder::class,
            SeoMetaSeeder::class,
        ]);
    }
}
