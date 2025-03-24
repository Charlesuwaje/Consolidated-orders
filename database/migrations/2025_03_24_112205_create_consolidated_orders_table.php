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
        Schema::create('consolidated_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->string('sku')->unique();
            $table->integer('quantity');
            $table->decimal('item_price', 10, 2);
            $table->decimal('line_total', 10, 2);
            $table->dateTime('order_date');
            $table->string('order_status', 50);
            $table->decimal('order_total', 10, 2);
            $table->timestamps();

            $table->index(['order_id', 'customer_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consolidated_orders');
    }
};
