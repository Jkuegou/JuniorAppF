<?php
// app/Models/FoodCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the menu items for the food category.
     */
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'category_id');
    }
}