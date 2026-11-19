<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\ContentStatsWidget;
use App\Models\Profile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // Samakan primary Filament dengan --color-primary di resources/css/app.css (#1e3093).
        // 600 = warna tombol, 500 = warna hover.
        $primary = Color::generatePalette('#1e3093');
        $primary[500] = $primary[400];
        $primary[600] = Color::generateV3Palette('#1e3093')[500];

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->favicon(function (): ?string {
                $profile = Cache::get('site_profile');

                if ($profile === null && Schema::hasTable('profiles')) {
                    $profile = Cache::rememberForever(
                        'site_profile',
                        fn () => Profile::first()?->toArray(),
                    );
                }

                $path = data_get($profile, 'favicon') ?? data_get($profile, 'logo');

                // Fallback sengaja null: public/favicon.ico masih 0 byte.
                return $path ? asset('storage/' . $path) : null;
            })
            ->colors([
                'primary' => $primary,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                ContentStatsWidget::class,
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
