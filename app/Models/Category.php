<?php

namespace App\Models;

use App\Traits\HasAutoSlug;
use App\Traits\HasSeoMeta;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasAutoSlug, HasFactory, HasSeoMeta;

    /**
     * Jumlah maksimal kategori yang tampil di menu Products (header & footer).
     */
    public const MENU_LIMIT = 7;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'image',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Daftar kategori ringkas untuk menu navigasi (maksimal MENU_LIMIT).
     *
     * @return Collection<int, static>
     */
    public static function menuList(): Collection
    {
        return static::query()
            ->select('id', 'nama', 'slug')
            ->orderBy('nama')
            ->take(self::MENU_LIMIT)
            ->get();
    }
}
