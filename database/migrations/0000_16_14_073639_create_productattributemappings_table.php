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
        Schema::create('productattributemapping', function (Blueprint $table) {
            $table->id('MappingID');
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('ValueID');
            $table->timestamps();
            
            // Optional: Add a unique constraint to prevent duplicate mappings
            $table->unique(['ProductID', 'ValueID']);
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            $table->foreign('ValueID')->references('ValueID')->on('productattributevalues')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_mapping');
    }
};