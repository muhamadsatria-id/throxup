<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasAutoSlug
{
    protected static function bootHasAutoSlug(): void
    {
        static::creating(function (self $model): void {
            $source = $model->slugSourceField();

            if (empty($model->slug)) {
                $model->slug = Str::slug((string) $model->{$source});
            }

            $base = $model->slug;
            $counter = 2;

            while (static::where('slug', $model->slug)->exists()) {
                $model->slug = $base.'-'.$counter++;
            }
        });
    }

    protected function slugSourceField(): string
    {
        return 'nama';
    }
}
