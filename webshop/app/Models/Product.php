<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'min_age',
        'min_players', 'max_players', 'category',
        'is_new', 'is_best_seller', 'is_discounted'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getMainImagePath()
    {
        return asset('Pictures/' . Str::slug($this->name) . '1.jpg');
    }
}