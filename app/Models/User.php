<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'profile_pic', 'rating'
    ];

    // User.php Model
    public function cart()
    {
        return $this->hasMany(CartItem::class);  // Make sure CartItem is the correct model name
    }
}