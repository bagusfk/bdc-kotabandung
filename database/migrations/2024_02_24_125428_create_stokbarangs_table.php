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
        Schema::create('stokbarangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('kelola_data_ksm_id')->constrained('kelola_data_ksms')->onDelete('cascade');
            $table->string('name', 128)->nullable();
            $table->integer('weight')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('price')->nullable();
            $table->date('expired')->nullable();
            $table->text('description')->nullable();
            $table->integer('sales')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokbarangs');
    }
};
