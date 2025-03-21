<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesreports', function (Blueprint $table) {
            $table->id('ReportID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('ProductID')->nullable();
            $table->integer('TotalSales')->nullable();
            $table->integer('QuantitySold')->nullable();
            $table->timestamp('ReportDate')->useCurrent();
            
            // Add foreign key if needed
            $table->foreign('ProductID')->references('ProductID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesreports');
    }
};