<?php

namespace App\Models;

use App\Traits\HasAutoSlug;
use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, HasAutoSlug, HasSeoMeta;

    protected $fillable = [
        'category_id',
        'nama',
        'slug',
        'sku',
        'deskripsi',
        'benefits',
        'detail_produk',
        'images',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'benefits' => 'array',
            'detail_produk' => 'array',
            'images' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
