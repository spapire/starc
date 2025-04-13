<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'id',
        'username',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke role
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function roleUser()
    {
        return $this->hasOne(RoleUser::class);
    }    

}
