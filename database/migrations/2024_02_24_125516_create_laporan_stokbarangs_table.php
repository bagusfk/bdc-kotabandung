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
        Schema::create('laporan_stokbarangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('stokbarangs')->onDelete('cascade');
            $table->date('date_input')->nullable();
            $table->integer('first_stock')->nullable();
            $table->integer('last_stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_stokbarangs');
    }
};
