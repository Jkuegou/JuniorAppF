<?php
// database/seeders/RestaurantSeeder.php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id' => 2, // First restaurant owner
                'name' => 'Le Bistrot Parisien',
                'description' => 'Un restaurant traditionnel français offrant une cuisine raffinée dans une ambiance chaleureuse.',
                'address' => '15 Rue de la Paix, 75002 Paris',
                'latitude' => 48.8698,
                'longitude' => 2.3298,
                '//' => '0145678901',
                'cuisine_type' => 'Française',
                'opening_hour' => '11:00',
                'closing_hour' => '23:00',
                'delivery_fee' => 3.50,
                'min_order_amount' => 15.00,
                'delivery_time_min' => 30,
                'is_active' => true,
                'logo_path' => 'restaurants/bistrot_logo.jpg',
                'cover_image_path' => 'restaurants/bistrot_cover.jpg',
            ],
            [
                'user_id' => 2, // First restaurant owner
                'name' => 'La Pizzeria',
                'description' => 'Pizzas authentiques cuites au feu de bois avec des ingrédients frais importés d\'Italie.',
                'address' => '25 Rue du Four, 75006 Paris',
                'latitude' => 48.8517,
                'longitude' => 2.3339,
                '//' => '0143567890',
                'cuisine_type' => 'Italienne',
                'opening_hour' => '12:00',
                'closing_hour' => '22:30',
                'delivery_fee' => 2.50,
                'min_order_amount' => 12.00,
                'delivery_time_min' => 25,
                'is_active' => true,
                'logo_path' => 'restaurants/pizzeria_logo.jpg',
                'cover_image_path' => 'restaurants/pizzeria_cover.jpg',
            ],
            [
                'user_id' => 3, // Second restaurant owner
                'name' => 'Sushi Master',
                'description' => 'Les meilleurs sushis de la ville préparés par nos chefs experts en cuisine japonaise.',
                'address' => '10 Rue Sainte-Anne, 75001 Paris',
                'latitude' => 48.8657,
                'longitude' => 2.3358,
                '//' => '0144556677',
                'cuisine_type' => 'Asiatique',
                'opening_hour' => '11:30',
                'closing_hour' => '22:00',
                'delivery_fee' => 4.00,
                'min_order_amount' => 18.00,
                'delivery_time_min' => 35,
                'is_active' => true,
                'logo_path' => 'restaurants/sushi_logo.jpg',
                'cover_image_path' => 'restaurants/sushi_cover.jpg',
            ],
            [
                'user_id' => 3, // Second restaurant owner
                'name' => 'Burger House',
                'description' => 'Des burgers gourmets avec du bœuf français de qualité supérieure et des recettes originales.',
                'address' => '42 Avenue des Champs-Élysées, 75008 Paris',
                'latitude' => 48.8698,
                'longitude' => 2.3083,
                '//' => '0147889900',
                'cuisine_type' => 'Américaine',
                'opening_hour' => '11:00',
                'closing_hour' => '23:30',
                'delivery_fee' => 3.00,
                'min_order_amount' => 14.00,
                'delivery_time_min' => 20,
                'is_active' => true,
                'logo_path' => 'restaurants/burger_logo.jpg',
                'cover_image_path' => 'restaurants/burger_cover.jpg',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}