<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Database\Seeders\FoodCategorySeeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\MenuItemSeeder;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            FoodCategorySeeder::class,
            RestaurantSeeder::class,
            MenuItemSeeder::class,
        ]);
    }
}
