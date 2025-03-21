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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->decimal('TotalAmount', 10, 2)->nullable();
            $table->enum('OrderStatus', ['Pending', 'Completed', 'Cancelled'])->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->nullable();
        
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};