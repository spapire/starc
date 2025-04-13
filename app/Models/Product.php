<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'description',
        'price',
        'link_tokopedia',
        'link_shopee',
        'link_gofood',
        'link_shopee_food',
        'thumbnail',
        'stock',
        'status',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function productLikes()
    {
        return $this->hasMany(ProductLike::class, 'product_id');
    }
}
