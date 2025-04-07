// 8. Payment Transactions Table
// filename: database/migrations/2023_01_01_000008_create_payment_transactions_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->string('status'); // success, failed, pending, refunded
            $table->text('payment_details')->nullable(); // Store additional payment gateway response
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
};
