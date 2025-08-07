<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'image_url',
        'price',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}