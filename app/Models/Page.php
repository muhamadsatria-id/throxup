<?php

namespace App\Models;

use App\Traits\HasAutoSlug;
use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory, HasAutoSlug, HasSeoMeta;

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected function slugSourceField(): string
    {
        return 'judul';
    }
}
