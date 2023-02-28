<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staf extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id',
    ];

    protected $attributes = [
        'nip' => null,
        'address' => null,
        'dob' => null,
        'education' => null,
        'photo' => null,
        'social_id' => null,
        'editor_id' => null,
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function social()
    {
        return $this->belongsTo(Social::class, 'social_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($staf) {
            $staf->social()->delete();
        });
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%');
        });
    }

    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }
}
