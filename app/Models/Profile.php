<?php

namespace App\Models;

use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory, HasSeoMeta;

    protected $fillable = [
        'nama',
        'deskripsi',
        'vision',
        'mission',
        'email',
        'phone',
        'whatsapp',
        'address',
        'logo',
        'favicon',
    ];

    protected function casts(): array
    {
        return [
            'mission' => 'array',
        ];
    }
}
