<?php

namespace App\Filament\Resources\ModalBanners\Pages;

use App\Filament\Resources\ModalBanners\ModalBannerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListModalBanners extends ListRecords
{
    protected static string $resource = ModalBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
