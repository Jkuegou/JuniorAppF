<?php
// app/Models/DeliveryTracking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_person_id',
        'current_latitude',
        'current_longitude',
        'status',
        'notes',
    ];

    /**
     * Get the order that is being tracked.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the delivery person.
     */
    public function deliveryPerson()
    {
        return $this->belongsTo(User::class, 'delivery_person_id');
    }
}