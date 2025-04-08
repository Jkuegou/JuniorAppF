<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_name',
        'card_number',
        'expiry_date',
        'cvv',
        'billing_address',
        'city',
        'zip_code',
        'country',
        'order_items',
    ];

    protected $casts = [
        'order_items' => 'array',
    ];
}
