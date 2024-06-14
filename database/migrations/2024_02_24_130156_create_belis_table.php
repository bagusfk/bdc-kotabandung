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
        Schema::create('belis', function (Blueprint $table) {
            $table->id();
            $table->string('cart', 128)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('qty')->nullable();
            $table->string('shipping_address', 128)->nullable();
            $table->string('payment_method', 128)->nullable();
            $table->double('pay')->nullable();
            $table->enum('order_process', ['process', 'finish', 'cancel'])->default('process');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('stokbarangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belis');
    }
};
