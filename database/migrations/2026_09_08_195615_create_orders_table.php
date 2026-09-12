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
            $table->uuid('id')->primary();
            $table->foreignUuid('business_id')->constrained('businesses')->onDelete('cascade');
            $table->foreignUuid('table_id')->nullable()->constrained('restaurant_tables')->restrictOnDelete();
            $table->foreignUuid('work_shift_id')->constrained('work_shifts')->restrictOnDelete();
            $table->integer('display_number');
            $table->enum('status', ['pending', 'ready', 'paid', 'cancelled'])->default('pending');
            $table->bigInteger('discount_amount')->default(0);
            $table->integer('discount_percent')->default(0);
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
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
