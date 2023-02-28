<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $attributes = [
        'whatsapp' => null,
        'facebook' => null,
        'twitter' => null,
        'instagram' => null,
        'youtube' => null,
        'email' => null,
    ];
}
