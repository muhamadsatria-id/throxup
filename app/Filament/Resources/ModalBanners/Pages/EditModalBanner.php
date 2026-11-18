<?php

namespace App\Filament\Resources\ModalBanners\Pages;

use App\Filament\Resources\ModalBanners\ModalBannerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditModalBanner extends EditRecord
{
    protected static string $resource = ModalBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
