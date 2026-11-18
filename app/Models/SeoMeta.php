<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoMeta extends Model
{
    /** @use HasFactory<\Database\Factories\SeoMetaFactory> */
    use HasFactory;

    protected $fillable = [
        'seoable_type',
        'seoable_id',
        'title',
        'deskripsi',
        'keyword',
        'canonical_url',
        'robots',
        'og_image',
        'schema_json',
        'is_manual',
    ];

    protected function casts(): array
    {
        return [
            'schema_json' => 'array',
            'is_manual' => 'boolean',
        ];
    }

    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}
