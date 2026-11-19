<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\ModalBanner;
use App\Models\News;
use App\Models\Page;
use App\Models\Platform;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Setting;
use App\Services\SeoService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Fluent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $profileData = Schema::hasTable('profiles')
                ? Cache::rememberForever('site_profile', fn () => Profile::first()?->toArray())
                : null;

            $platformData = Schema::hasTable('platforms')
                ? Cache::rememberForever('site_platform', fn () => Platform::first()?->toArray())
                : null;

            $settingData = Schema::hasTable('settings')
                ? Cache::rememberForever('site_setting', fn () => Setting::first()?->toArray())
                : null;

            $navCategories = Schema::hasTable('categories')
                ? Cache::rememberForever('nav_categories', fn () => Category::select('id', 'nama', 'slug')->get()->toArray())
                : [];

            // Menu Products di header & footer hanya menampilkan maksimal 7 kategori.
            $menuCategories = Schema::hasTable('categories')
                ? Cache::rememberForever('menu_categories', fn () => Category::menuList()->toArray())
                : [];

            $modalData = Schema::hasTable('modal_banners')
                ? Cache::rememberForever('active_modal_banners', fn () => ModalBanner::where('is_active', true)->latest()->get()->map(fn (ModalBanner $modal) => $modal->toArray())->all())
                : [];

            $view->with([
                'profile' => $profileData ? new Fluent($profileData) : null,
                'platform' => $platformData ? new Fluent($platformData) : null,
                'siteSetting' => $settingData ? new Fluent($settingData) : null,
                'navCategories' => $navCategories,
                'menuCategories' => $menuCategories,
                'activeModals' => collect($modalData)->map(fn (array $modal) => new Fluent($modal)),
                'activeModal' => $modalData ? new Fluent($modalData[0]) : null,
            ]);
        });

        // Halaman 404 tidak boleh diindeks, termasuk saat slug tidak ditemukan lewat route /{page:slug}.
        // Laravel me-render error lewat namespace "errors::404", sedangkan fallback memakai "errors.404".
        $noindex404 = function () {
            SEOTools::setTitle('Halaman Tidak Ditemukan', false);
            SEOMeta::setRobots('noindex, nofollow');
        };

        View::composer(['errors.404', 'errors::404', 'errors::4xx'], $noindex404);

        // Otomatis hapus cache setiap kali admin mengubah data di Filament
        Profile::saved(fn () => Cache::forget('site_profile'));
        Platform::saved(fn () => Cache::forget('site_platform'));
        Setting::saved(fn () => Cache::forget('site_setting'));
        Category::saved(fn () => Cache::forget('nav_categories'));
        Category::saved(fn () => Cache::forget('menu_categories'));
        Category::deleted(fn () => Cache::forget('nav_categories'));
        Category::deleted(fn () => Cache::forget('menu_categories'));
        ModalBanner::saved(function () {
            Cache::forget('active_modal_banners');
            Cache::forget('active_modal_banner');
        });
        ModalBanner::deleted(function () {
            Cache::forget('active_modal_banners');
            Cache::forget('active_modal_banner');
        });

        // SEO memakai gambar hero/logo sebagai OG image default.
        HeroCarousel::saved(fn () => Cache::forget('seo_default_image'));
        HeroCarousel::deleted(fn () => Cache::forget('seo_default_image'));
        HeroCarousel::saved(fn () => Cache::forget('home_hero_carousels'));
        HeroCarousel::deleted(fn () => Cache::forget('home_hero_carousels'));

        Product::saved(fn () => Cache::forget('home_featured_products'));
        Product::deleted(fn () => Cache::forget('home_featured_products'));
        News::saved(fn () => Cache::forget('home_latest_news'));
        News::deleted(fn () => Cache::forget('home_latest_news'));

        // Sitemap ikut berubah saat konten publik berubah.
        Product::saved(fn () => SeoService::flushSitemap());
        Product::deleted(fn () => SeoService::flushSitemap());
        News::saved(fn () => SeoService::flushSitemap());
        News::deleted(fn () => SeoService::flushSitemap());
        Page::saved(fn () => SeoService::flushSitemap());
        Page::deleted(fn () => SeoService::flushSitemap());
        Category::saved(fn () => SeoService::flushSitemap());
        Category::deleted(fn () => SeoService::flushSitemap());
    }
}
