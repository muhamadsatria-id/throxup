<?php

namespace App\Models;

use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroCarousel extends Model
{
    /** @use HasFactory<\Database\Factories\HeroCarouselFactory> */
    use HasFactory, HasSeoMeta;

    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'button_text',
        'button_url',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
