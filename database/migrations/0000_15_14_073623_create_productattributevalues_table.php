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
        Schema::create('productattributevalues', function (Blueprint $table) {
            $table->id('ValueID');
            $table->unsignedBigInteger('AttributeID');
            $table->string('value', 100);
            $table->timestamps();

            $table->foreign('AttributeID')->references('AttributeID')->on('productattributes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
    }
};