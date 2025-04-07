<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategorySeeder extends Seeder
{
    public function run(): void
    {
        FoodCategory::create([
            'name' => 'Burgers',
        ]);

        FoodCategory::create([
            'name' => 'Pizzas',
        ]);
    }
}
