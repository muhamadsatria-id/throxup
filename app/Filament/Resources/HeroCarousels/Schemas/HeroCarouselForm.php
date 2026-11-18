<?php

namespace App\Filament\Resources\HeroCarousels\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroCarouselForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Headline')
                    ->required()
                    ->maxLength(255),
                Textarea::make('deskripsi')
                    ->label('Sub-headline')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Gambar Background')
                    ->image()
                    ->disk('public')->directory('hero-carousels')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255),
                TextInput::make('button_url')
                    ->label('URL Tombol')
                    ->url()
                    ->nullable()->helperText('(opsional)')
                    ->maxLength(255),
                TextInput::make('order')
                    ->label('Urutan')
                    ->integer()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
