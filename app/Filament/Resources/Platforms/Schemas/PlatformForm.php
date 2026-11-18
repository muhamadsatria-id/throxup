<?php

namespace App\Filament\Resources\Platforms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PlatformForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tiktok')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('facebook')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('instagram')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('shopee')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('tiktok_shop')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('tokopedia')->url()->nullable()->helperText('(opsional)')->maxLength(255),
                TextInput::make('lazada')->url()->nullable()->helperText('(opsional)')->maxLength(255),
            ]);
    }
}
