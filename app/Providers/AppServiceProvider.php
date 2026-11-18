<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ModalBanner;
use App\Models\Platform;
use App\Models\Profile;
use App\Models\Setting;
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
        if (! app()->runningInConsole()) {
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
                    ? Cache::rememberForever('active_modal_banner', fn () => ModalBanner::where('is_active', true)->latest()->first()?->toArray())
                    : null;

                $view->with([
                    'profile' => $profileData ? new Fluent($profileData) : null,
                    'platform' => $platformData ? new Fluent($platformData) : null,
                    'siteSetting' => $settingData ? new Fluent($settingData) : null,
                    'navCategories' => $navCategories,
                    'menuCategories' => $menuCategories,
                    'activeModal' => $modalData ? new Fluent($modalData) : null,
                ]);
            });
        }

        // Otomatis hapus cache setiap kali admin mengubah data di Filament
        Profile::saved(fn () => Cache::forget('site_profile'));
        Platform::saved(fn () => Cache::forget('site_platform'));
        Setting::saved(fn () => Cache::forget('site_setting'));
        Category::saved(fn () => Cache::forget('nav_categories'));
        Category::saved(fn () => Cache::forget('menu_categories'));
        Category::deleted(fn () => Cache::forget('nav_categories'));
        Category::deleted(fn () => Cache::forget('menu_categories'));
        ModalBanner::saved(fn () => Cache::forget('active_modal_banner'));
        ModalBanner::deleted(fn () => Cache::forget('active_modal_banner'));
    }
}
