<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use Notifiable;

    // protected $fillable = [
    //     'name', 'email', 'password', 'role',
    // ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role',
        'address',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the restaurants owned by the user.
     */
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    /**
     * Get the orders made by the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the deliveries made by the user.
     */
    public function deliveries()
    {
        return $this->hasMany(Order::class, 'delivery_person_id');
    }

    /**
     * Get the reviews posted by the user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the addresses associated with the user.
     */
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * Get the notifications for the user.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get the carts belonging to the user.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the payment transactions made by the user.
     */
    public function paymentTransactions()
    {
        return $this->hasMany(PaymentTransaction::class);
    }
}



