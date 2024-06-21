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
            $table->enum('cluster', ['a', 'b', 'c', 'd']);
            $table->unsignedBigInteger('category_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('owner', 128);
            $table->string('owner_picture', 128);
            $table->string('no_wa', 15);
            $table->string('brand_name', 128);
            $table->string('logo_image', 128)->nullable();
            $table->string('link_ig')->nullable();
            $table->string('business_entity');
            $table->text('business_description');
            $table->string('product_sales_address', 128);
            $table->text('address')->nullable();
            $table->string('nib', 50)->nullable();
            $table->string('nib_document', 128)->nullable();
            $table->string('permission_letter', 128)->nullable();
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
