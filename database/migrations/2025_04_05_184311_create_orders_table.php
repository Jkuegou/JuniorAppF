// 5. Orders Table
// filename: database/migrations/2023_01_01_000005_create_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->foreignId('delivery_person_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('order_number')->unique();
            $table->enum('status', [
                'pending', 'confirmed', 'preparing', 
                'ready_for_pickup', 'out_for_delivery', 
                'delivered', 'cancelled'
            ])->default('pending');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('delivery_fee', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->decimal('total', 10, 2);
            $table->text('delivery_address');
            $table->decimal('delivery_latitude', 10, 7)->nullable();
            $table->decimal('delivery_longitude', 10, 7)->nullable();
            $table->text('special_instructions')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('payment_method')->nullable(); // cash, credit_card, etc.
            $table->string('payment_status')->default('pending'); // pending, completed, failed, refunded
            $table->timestamp('estimated_delivery_time')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};