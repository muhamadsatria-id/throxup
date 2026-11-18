<?php

namespace App\Models;

use App\Traits\HasAutoSlug;
use App\Traits\HasSeoMeta;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasAutoSlug, HasFactory, HasSeoMeta;

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
            'images' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * URL publik untuk gambar produk pada indeks tertentu.
     */
    public function imageUrl(int $index = 0): ?string
    {
        $path = $this->images[$index] ?? null;

        if (! filled($path)) {
            return null;
        }

        return Str::startsWith($path, ['http://', 'https://', '//'])
            ? $path
            : asset('storage/'.ltrim($path, '/'));
    }

    /**
     * Semua URL gambar produk yang valid, urut sesuai data tersimpan.
     *
     * @return array<int, string>
     */
    public function imageUrls(): array
    {
        return collect($this->images ?? [])
            ->keys()
            ->map(fn (int $index) => $this->imageUrl($index))
            ->filter()
            ->values()
            ->all();
    }
}
