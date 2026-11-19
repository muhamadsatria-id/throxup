<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\HeroCarousel;
use App\Models\ModalBanner;
use App\Models\News;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ConvertImagesToWebp extends Command
{
    protected $signature = 'images:convert-webp {--directory= : Relative storage/app/public directory}';

    protected $description = 'Convert stored JPG/PNG images to WebP and update public image paths.';

    public function handle(): int
    {
        $directory = trim((string) $this->option('directory'), '/');
        $root = $directory !== '' ? $directory : '';
        $files = Storage::disk('public')->allFiles($root);
        $converted = 0;

        foreach ($files as $file) {
            if (! preg_match('/\.(?:jpe?g|png)$/i', $file)) {
                continue;
            }

            $source = Storage::disk('public')->path($file);
            $mime = (string) mime_content_type($source);
            $image = $mime === 'image/png'
                ? @imagecreatefrompng($source)
                : @imagecreatefromjpeg($source);

            if (! $image) {
                continue;
            }

            $webpPath = preg_replace('/\.(?:jpe?g|png)$/i', '.webp', $file);

            if (! imagewebp($image, Storage::disk('public')->path($webpPath), 82)) {
                imagedestroy($image);
                continue;
            }

            imagedestroy($image);
            Storage::disk('public')->delete($file);
            $this->replacePath($file, $webpPath);
            $converted++;
        }

        $this->info("Converted {$converted} image(s) to WebP.");

        return self::SUCCESS;
    }

    private function replacePath(string $oldPath, string $newPath): void
    {
        $models = [
            HeroCarousel::class => ['image'],
            ModalBanner::class => ['image'],
            News::class => ['thumbnail'],
            Profile::class => ['logo', 'favicon'],
            Category::class => ['image'],
        ];

        foreach ($models as $modelClass => $columns) {
            foreach ($modelClass::all() as $model) {
                foreach ($columns as $column) {
                    if ($model->{$column} === $oldPath) {
                        $model->update([$column => $newPath]);
                    }
                }
            }
        }

        foreach (Product::all() as $product) {
            $images = collect($product->images ?? [])
                ->map(fn ($path) => $path === $oldPath ? $newPath : $path)
                ->values()
                ->all();

            if ($images !== ($product->images ?? [])) {
                $product->update(['images' => $images]);
            }
        }
    }
}
