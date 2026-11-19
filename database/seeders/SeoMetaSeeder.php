<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\ModalBanner;
use App\Models\News;
use App\Models\Page;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SeoMetaSeeder extends Seeder
{
    /**
     * Backfill SEO otomatis untuk model yang sudah ada sebelum trait
     * HasSeoMeta dipasang, atau yang dibuat tanpa event.
     */
    public function run(): void
    {
        $models = collect([
            Profile::query()->get(),
            Platform::query()->get(),
            Setting::query()->get(),
            HeroCarousel::query()->get(),
            ModalBanner::query()->get(),
            Category::query()->get(),
            Product::query()->get(),
            News::query()->get(),
            Page::query()->get(),
        ])->flatten();

        foreach ($models as $model) {
            if (! $model->seoMeta()->exists()) {
                $model->touch();
            }
        }
    }
}
