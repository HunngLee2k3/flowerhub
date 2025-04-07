<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'price', 'description', 'image', 'stock'
    ];

    // Quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ với OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}