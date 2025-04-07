<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    // Quan hệ với Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}