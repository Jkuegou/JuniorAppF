<?php
// app/Models/CartItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'menu_item_id',
        'quantity',
        'special_instructions',
    ];

    /**
     * Get the cart that the item belongs to.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the menu item that the cart item is for.
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}