<?php

namespace App\Filament\Resources\HeroCarousels\Pages;

use App\Filament\Resources\HeroCarousels\HeroCarouselResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHeroCarousel extends EditRecord
{
    protected static string $resource = HeroCarouselResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
