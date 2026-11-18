<?php

namespace App\Models;

use App\Traits\HasSeoMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory, HasSeoMeta;

    protected $fillable = [
        'ga4_code',
        'gtm_head_code',
        'gtm_body_code',
        'gsc_verification',
        'custom_head_scripts',
        'custom_body_scripts',
    ];
}
