<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingaddresses', function (Blueprint $table) {
            $table->id('AddressID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->string('LocationName', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('Email', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('Phone', 15)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('Address', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('Country', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('ZipCode', 10)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->tinyInteger('IsPickupAddress')->default(0);
            
            // Add foreign key if needed
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippingaddresses');
    }
};