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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('TransactionID');
            $table->unsignedBigInteger('CustomerID');
            $table->unsignedBigInteger('OrderID');
            $table->decimal('Amount', 10, 2);
            $table->dateTime('TransactionDate')->useCurrent();
            $table->timestamps();

            $table->foreign('CustomerID')
                  ->references('CustomerID')
                  ->on('customers')
                  ->onDelete('cascade');
            
            $table->foreign('OrderID')
                  ->references('OrderID')
                  ->on('orders')
                  ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};