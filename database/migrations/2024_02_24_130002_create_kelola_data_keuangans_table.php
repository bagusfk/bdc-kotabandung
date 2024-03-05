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
        Schema::create('kelola_data_keuangans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('produk')->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('total_harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_data_keuangans');
    }
};
