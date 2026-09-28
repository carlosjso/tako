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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignUuid('category_id')->constrained('categories')->restrictOnDelete();
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->bigInteger('sale_price');
            $table->bigInteger('production_cost');
            $table->integer('current_stock')-> default(0);
            $table->boolean('is_available')->default(true);
            $table->boolean('track_inventory')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
