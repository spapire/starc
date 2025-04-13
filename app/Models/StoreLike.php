<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreLike extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }
}

