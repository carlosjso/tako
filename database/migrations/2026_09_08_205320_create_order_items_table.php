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
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_id')->constrained('orders')->restrictOnDelete();
            $table->foreignUuid('product_id')->constrained('products')->restrictOnDelete();
            $table->integer('quantity');
            $table->bigInteger('unit_price_at_sale');
            $table->bigInteger('unit_cost_at_sale');
            $table->string('modifiers')->nullable();
            $table->enum('status', ['pending', 'ready', 'paid', 'cancelled'])->default('pending');
            $table->string('cancel_reason')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
