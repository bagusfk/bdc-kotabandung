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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->string('order_id', 125)->nullable();
            $table->char('invoice', 125)->unique();
            $table->string('address', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('total_qty', 125)->nullable();
            $table->string('total_weight', 125)->nullable();
            $table->string('expedition', 125)->nullable();
            $table->string('expedition_type', 125)->nullable();
            $table->string('no_resi', 125)->nullable();
            $table->string('shipping_cost', 125)->nullable();
            $table->string('sub_total_price', 125)->nullable();
            $table->string('total_price', 125)->nullable();
            $table->string('payment_type', 125)->nullable();
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->enum('order_status', ['process','dikemas', 'dikirim','selesai', 'cancel'])->default('process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
