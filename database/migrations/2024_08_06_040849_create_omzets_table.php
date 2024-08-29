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
        Schema::create('omzets', function (Blueprint $table) {
            $table->id();
            $table->string('month', 128)->nullable();
            $table->double('omzet')->nullable();
            $table->double('total_omzet')->nullable();
            $table->double('profit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('omzets');
    }
};
