<?php

namespace App\Filament\Resources\ModalBanners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ModalBannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul / Alt Text')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('Gambar Banner')
                    ->image()
                    ->previewable(false)
                    ->fetchFileInformation(false)
                    ->disk('public')->visibility('public')->directory('modal-banners')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('link_url')
                    ->label('URL Tujuan')
                    ->url()
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
