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
            $table->string('code', 125)->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->string('address', 225)->nullable();
            $table->enum('order_status', ['process', 'finish', 'cancel'])->default('process');
            $table->enum('payment_status', ['process', 'paid', 'cancel'])->default('process');
            $table->double('total_payment')->nullable();
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
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
