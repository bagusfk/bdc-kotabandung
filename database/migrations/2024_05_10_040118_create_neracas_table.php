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
        Schema::create('neracas', function (Blueprint $table) {
            $table->id();
            $table->date('input_date')->nullable();
            $table->float('cash')->nullable();
            $table->float('receivables')->nullable();
            $table->float('supplies')->nullable();
            $table->float('equipment')->nullable();
            $table->float('debt')->nullable();
            $table->float('capital')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neracas');
    }
};
