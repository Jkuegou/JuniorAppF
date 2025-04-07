<?php
// app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'restaurant_id',
        'food_rating',
        'delivery_rating',
        'comment',
        'is_approved',
    ];

    protected $casts = [
        'food_rating' => 'integer',
        'delivery_rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    /**
     * Get the user who wrote the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that the review is for.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the restaurant that the review is for.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}