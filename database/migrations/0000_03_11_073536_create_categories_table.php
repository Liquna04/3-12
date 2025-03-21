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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('CategoryID');
            $table->string('CategoryName', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->unsignedBigInteger('ParentID')->nullable();
            $table->tinyInteger('IsVisible')->default(1);
            $table->timestamps();
            
            $table->foreign('ParentID')->references('CategoryID')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};