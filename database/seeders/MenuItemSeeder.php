<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
            [
                'name' => 'Coq au Vin',
                'description' => 'Classic French dish of chicken braised with wine, lardons, mushrooms, and garlic',
                'price' => 21.50,
                'restaurant_id' => 1, // Make sure this matches your restaurant IDs
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Beef Bourguignon',
                'description' => 'Beef stewed in red wine with carrots, onions, garlic, and herbs',
                'price' => 23.75,
                'restaurant_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spaghetti Carbonara',
                'description' => 'Traditional Italian pasta with eggs, cheese, pancetta, and black pepper',
                'price' => 16.90,
                'restaurant_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more menu items as needed
        ]);
    }
}