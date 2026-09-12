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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cash_register_session_id')->constrained('cash_register_sessions')->restrictOnDelete();
            $table->foreignUuid('order_id')->constrained('orders')->restrictOnDelete();
            $table->enum('method', ['cash', 'card', 'transfer']);
            $table->bigInteger('amount');
            $table->bigInteger('tip_amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
