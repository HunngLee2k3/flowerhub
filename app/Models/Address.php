<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line',
        'city',
        'country',
        'phone',
        'user_id', // Đảm bảo có cột này trong bảng addresses
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với Orders
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}