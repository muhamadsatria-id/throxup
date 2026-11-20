<?php

namespace App\Support;

use Filament\Forms\Components\FileUpload;

class ImageUploadConstraints
{
    public const ACCEPTED_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

    public const EXTENSIONS = 'jpg,jpeg,png,webp';

    public const MAX_SIZE_KB = 2048;

    public static function apply(FileUpload $component, bool $optional = false): FileUpload
    {
        $component
            ->acceptedFileTypes(self::ACCEPTED_TYPES)
            ->rule('extensions:'.self::EXTENSIONS)
            ->maxSize(self::MAX_SIZE_KB)
            ->helperText(
                ($optional ? '(opsional) ' : '')
                .'Jenis file: gambar. Format: JPG, PNG, WEBP (.jpg, .jpeg, .png, .webp). Ukuran maksimal 2 MB.'
            );

        return $component;
    }
}
