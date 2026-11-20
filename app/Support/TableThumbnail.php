<?php

namespace App\Support;

use Filament\Tables\Columns\ImageColumn;

class TableThumbnail
{
    public static function apply(ImageColumn $column): ImageColumn
    {
        return $column
            ->label('Gambar')
            ->disk('public')
            ->visibility('public')
            ->checkFileExistence(false)
            ->imageSize(40)
            ->square()
            ->extraImgAttributes(['class' => 'object-cover rounded']);
    }
}
