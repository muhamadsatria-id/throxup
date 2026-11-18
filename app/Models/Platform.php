<?php

namespace App\Models;

use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    /** @use HasFactory<\Database\Factories\PlatformFactory> */
    use HasFactory, HasSeoMeta;

    protected $fillable = [
        'tiktok',
        'facebook',
        'instagram',
        'shopee',
        'tiktok_shop',
        'tokopedia',
        'lazada',
    ];
}
