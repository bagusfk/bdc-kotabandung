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
        Schema::create('kelola_data_ksms', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 128)->nullable();
            $table->string('owner', 128)->nullable();
            $table->string('no_whatsapp', 15)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('address')->nullable();
            $table->date('registration_date')->nullable();
            $table->enum('cluster', ['A', 'B', 'C', 'D'])->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_data_ksms');
    }
};
