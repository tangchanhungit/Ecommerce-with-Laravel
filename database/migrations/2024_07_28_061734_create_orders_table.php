<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->enum('status',['pending', 'processing','completed','cancelled'])->default('pending');
            $table->decimal('total_amount',10,2);
            $table->text('shipping_address');
            $table->string('payment_method');
            $table->timestamps();

            $table->foreignId('user_id')
            -> constrained('users')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
