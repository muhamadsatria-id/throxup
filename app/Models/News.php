<?php

namespace App\Models;

use App\Traits\HasAutoSlug;
use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory, HasAutoSlug, HasSeoMeta;

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'thumbnail',
        'deskripsi',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    protected function slugSourceField(): string
    {
        return 'judul';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
