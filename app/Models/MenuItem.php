<?php
// app/Models/MenuItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'description',
        'price',
        'image_path',
        'is_available',
        'is_vegetarian',
        'is_featured',
        'preparation_time',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
        'is_vegetarian' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the restaurant that the menu item belongs to.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Get the category that the menu item belongs to.
     */
    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }

    /**
     * Get the order items for the menu item.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the cart items for the menu item.
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
