<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Produk', Product::count())
                ->description('Aktif: '.Product::where('is_active', true)->count())
                ->color('success'),
            Stat::make('Kategori', Category::count())
                ->description('Kategori produk')
                ->color('info'),
            Stat::make('Berita', News::count())
                ->description('Artikel terpublikasi: '.News::whereNotNull('published_at')->count())
                ->color('warning'),
            Stat::make('Halaman', Page::count())
                ->description('Aktif: '.Page::where('is_active', true)->count())
                ->color('primary'),
        ];
    }
}
