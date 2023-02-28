<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'bg_navbar',
        'bg_staf',
        'bg_login',
        'social_id',
    ];

    protected $attributes = [
        'logo' => null,
        'bg_navbar' => null,
        'bg_staf' => null,
        'bg_login' => null,
        'social_id' => null,
    ];

    public function social()
    {
        return $this->belongsTo(Social::class, 'social_id');
    }
}
