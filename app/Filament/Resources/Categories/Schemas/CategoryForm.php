<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Support\ImageUploadConstraints;
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
                    ->hidden()
                    ->dehydrated(false),
                Textarea::make('deskripsi')
                    ->nullable()->helperText('(opsional)')
                    ->rows(3)
                    ->columnSpanFull(),
                ImageUploadConstraints::apply(
                    FileUpload::make('image')
                        ->previewable(false)
                        ->fetchFileInformation(false)
                        ->disk('public')->visibility('public')->directory('categories')
                        ->nullable(),
                    optional: true,
                ),
            ]);
    }
}
