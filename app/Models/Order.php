<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address_id', 'total', 'status'];

    protected $casts = [
        'total' => 'decimal:2', // Đảm bảo Laravel xử lý total như số thập phân
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}