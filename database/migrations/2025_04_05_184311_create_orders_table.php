<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('card_name');
            $table->string('card_number');
            $table->string('expiry_date');
            $table->string('cvv');
            $table->string('billing_address');
            $table->string('city');
            $table->string('zip_code');
            $table->string('country');
            $table->text('order_items'); // JSON data
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
