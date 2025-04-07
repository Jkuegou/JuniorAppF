// 2. Restaurants Table
// filename: database/migrations/2023_01_01_000002_create_restaurants_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Owner of the restaurant
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('address');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('phone_number');
            $table->string('cuisine_type')->nullable();
            $table->time('opening_hour');
            $table->time('closing_hour');
            $table->decimal('delivery_fee', 8, 2)->default(0);
            $table->decimal('min_order_amount', 8, 2)->default(0);
            $table->integer('delivery_time_min')->nullable(); // Estimated delivery time in minutes
            $table->boolean('is_active')->default(true);
            $table->string('logo_path')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};