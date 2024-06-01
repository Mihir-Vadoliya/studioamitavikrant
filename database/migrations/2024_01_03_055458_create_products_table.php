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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('productImage');
            $table->string('leadTime');
            $table->string('price');
            $table->enum('isActive', ['active', 'inactive'])->default('inactive')->comment('Active, Inactive');
            $table->string('numberOfColors');
            $table->string('lookBookImage');
            $table->string('size');
            $table->unsignedBigInteger('collection');
            $table->unsignedBigInteger('construction');
            $table->unsignedBigInteger('material');
            $table->unsignedBigInteger('design');
            $table->unsignedBigInteger('colorPaletts');
            $table->unsignedBigInteger('color');
            $table->timestamps();

            // $table->foreign('collection')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->foreign('construction')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->foreign('material')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->foreign('design')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->foreign('colorPaletts')->references('id')->on('subcategories')->onDelete('cascade');
            // $table->foreign('color')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
