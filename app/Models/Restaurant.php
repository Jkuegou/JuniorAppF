<?php
// app/Models/Restaurant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'phone_number',
        'cuisine_type',
        'opening_hour',
        'closing_hour',
        'delivery_fee',
        'min_order_amount',
        'delivery_time_min',
        'is_active',
        'logo_path',
        'cover_image_path',
    ];

    protected $casts = [
        'opening_hour' => 'datetime',
        'closing_hour' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user who owns the restaurant.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the menu items for the restaurant.
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    /**
     * Get the orders for the restaurant.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the reviews for the restaurant.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the carts related to this restaurant.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}