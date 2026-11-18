<?php

namespace App\Filament\Resources\ModalBanners\Pages;

use App\Filament\Resources\ModalBanners\ModalBannerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateModalBanner extends CreateRecord
{
    protected static string $resource = ModalBannerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
