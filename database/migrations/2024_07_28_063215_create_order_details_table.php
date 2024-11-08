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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('unit_price',10,2);
            $table->decimal('total_price',10,2);
            $table->timestamps();

            $table->foreignId('order_id')
            ->constrained('orders')
            ->onDelete('restrict');

            $table->foreignId('product_id')
            ->constrained('products')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
