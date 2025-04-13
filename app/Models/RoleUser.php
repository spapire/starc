<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public $timestamps = false;

    protected $table = 'role_user'; // <--- pastikan ini sesuai dengan nama di database kamu

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
