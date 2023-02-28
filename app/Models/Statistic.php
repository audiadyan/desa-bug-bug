<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'male',
        'female',
        'total',
    ];

    protected $attributes = [
        'user_id' => null,
        'male' => 0,
        'female' => 0,
        'total' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
