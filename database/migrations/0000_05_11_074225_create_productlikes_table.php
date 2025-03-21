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
        Schema::create('productlikes', function (Blueprint $table) {
            $table->id('LikeID');
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->unsignedBigInteger('ProductID')->nullable();
            $table->timestamp('CreatedAt')->useCurrent();
            
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
            
            // Optional: Add a unique constraint to prevent duplicate likes
            $table->unique(['CustomerID', 'ProductID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_likes');
    }
};