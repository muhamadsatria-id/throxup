<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class WebpUpload
{
    public static function store(TemporaryUploadedFile $file, string $directory): string
    {
        if (! function_exists('imagewebp') || ! function_exists('imagecreatetruecolor')) {
            return $file->store($directory, 'public');
        }

        $source = $file->getRealPath();
        $mime = (string) mime_content_type($source);

        $image = match ($mime) {
            'image/jpeg' => @imagecreatefromjpeg($source),
            'image/png' => @imagecreatefrompng($source),
            'image/webp' => @imagecreatefromwebp($source),
            default => null,
        };

        if (! $image) {
            return $file->store($directory, 'public');
        }

        $maxDimension = 1920;
        $width = imagesx($image);
        $height = imagesy($image);

        if ($width > $maxDimension || $height > $maxDimension) {
            $scale = min($maxDimension / $width, $maxDimension / $height);
            $resized = imagecreatetruecolor(
                max(1, (int) round($width * $scale)),
                max(1, (int) round($height * $scale))
            );

            if ($resized) {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
                imagecopyresampled(
                    $resized,
                    $image,
                    0,
                    0,
                    0,
                    0,
                    imagesx($resized),
                    imagesy($resized),
                    $width,
                    $height
                );
                imagedestroy($image);
                $image = $resized;
            }
        }

        if ($mime === 'image/png') {
            imagepalettetotruecolor($image);
            imagealphablending($image, false);
            imagesavealpha($image, true);
        }

        $relativePath = trim($directory, '/').'/'.Str::uuid().'.webp';
        $absolutePath = Storage::disk('public')->path($relativePath);

        if (! is_dir(dirname($absolutePath))) {
            mkdir(dirname($absolutePath), 0755, true);
        }

        if (! imagewebp($image, $absolutePath, 82)) {
            imagedestroy($image);

            return $file->store($directory, 'public');
        }

        imagedestroy($image);

        return $relativePath;
    }
}
