<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Quan hệ với Addresses
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    // Thêm relationship với Address
   
    // Quan hệ với Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}