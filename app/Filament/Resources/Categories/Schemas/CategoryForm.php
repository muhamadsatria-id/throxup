<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Diisi otomatis oleh sistem.'),
                Textarea::make('deskripsi')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')->directory('categories')
                    ->nullable()->helperText('(opsional)'),
            ]);
    }
}
