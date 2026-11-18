<?php

namespace App\Filament\Resources\HeroCarousels\Pages;

use App\Filament\Resources\HeroCarousels\HeroCarouselResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeroCarousels extends ListRecords
{
    protected static string $resource = HeroCarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
