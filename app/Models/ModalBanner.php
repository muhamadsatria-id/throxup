<?php

namespace App\Models;

use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalBanner extends Model
{
    /** @use HasFactory<\Database\Factories\ModalBannerFactory> */
    use HasFactory, HasSeoMeta;

    protected $fillable = [
        'title',
        'image',
        'link_url',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
