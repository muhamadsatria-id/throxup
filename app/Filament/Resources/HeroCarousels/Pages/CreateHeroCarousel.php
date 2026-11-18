<?php

namespace App\Filament\Resources\HeroCarousels\Pages;

use App\Filament\Resources\HeroCarousels\HeroCarouselResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroCarousel extends CreateRecord
{
    protected static string $resource = HeroCarouselResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
