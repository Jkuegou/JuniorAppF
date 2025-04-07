<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        $userId = 1; // Assurez-vous que cet ID utilisateur existe

        $restaurants = [
            [
                'name' => 'Le Petit Bistro',
                'address' => '12 rue de la Paix, Paris',
                'cuisine_type' => 'Française',
                'description' => 'Un charmant bistro parisien avec une atmosphère conviviale',
                'user_id' => $userId,
                'latitude' => 48.869566, // Coordonnées approximatives pour Paris
                'longitude' => 2.332626,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasta Bella',
                'address' => '45 avenue des Champs-Élysées, Paris',
                'cuisine_type' => 'Italienne',
                'description' => 'Restaurant italien authentique avec des pâtes fraîches faites maison',
                'user_id' => $userId,
                'latitude' => 48.873792,
                'longitude' => 2.295028,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Master',
                'address' => '8 rue du Commerce, Lyon',
                'cuisine_type' => 'Japonaise',
                'description' => 'Les meilleurs sushis frais préparés par des chefs japonais',
                'user_id' => $userId,
                'latitude' => 45.7640,
                'longitude' => 4.8357,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('restaurants')->insert($restaurants);
    }
}