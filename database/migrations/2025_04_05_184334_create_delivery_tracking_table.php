// 9. Delivery Tracking Table
// filename: database/migrations/2023_01_01_000009_create_delivery_tracking_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('delivery_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('delivery_person_id')->nullable()->constrained('users')->nullOnDelete();
            $table->decimal('current_latitude', 10, 7)->nullable();
            $table->decimal('current_longitude', 10, 7)->nullable();
            $table->enum('status', ['assigned', 'picked_up', 'on_the_way', 'arrived', 'delivered', 'failed']);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_tracking');
    }
};