<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'delivery_person_id',
        'order_number',
        'status',
        'subtotal',
        'delivery_fee',
        'tax',
        'total',
        'delivery_address',
        'delivery_latitude',
        'delivery_longitude',
        'special_instructions',
        'is_paid',
        'payment_method',
        'payment_status',
        'estimated_delivery_time',
        'delivered_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'is_paid' => 'boolean',
        'estimated_delivery_time' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    /**
     * Get the user that made the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the restaurant that the order is from.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Get the delivery person assigned to the order.
     */
    public function deliveryPerson()
    {
        return $this->belongsTo(User::class, 'delivery_person_id');
    }

    /**
     * Get the items for the order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the payment transactions for the order.
     */
    public function paymentTransactions()
    {
        return $this->hasMany(PaymentTransaction::class);
    }

    /**
     * Get the tracking info for the order.
     */
    public function tracking()
    {
        return $this->hasMany(DeliveryTracking::class);
    }

    /**
     * Get the review for the order.
     */
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
