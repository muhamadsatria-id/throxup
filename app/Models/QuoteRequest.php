<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'full_name',
        'business_email',
        'phone_number',
        'subject',
        'project_specifications',
        'status',
        'admin_notes',
    ];
}
