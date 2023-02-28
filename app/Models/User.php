<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PDO;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id',
    ];

    protected $attributes = [
        'phone' => null,
        'photo' => null,
        'role_id' => '2',
    ];

    protected $hidden = [
        'password',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%');
        });
    }
}
