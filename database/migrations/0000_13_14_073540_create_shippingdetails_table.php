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
        Schema::create('shippingdetails', function (Blueprint $table) {
            $table->id('ShippingID');
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('ProviderID');            
            $table->string('TrackingNumber', 100)->nullable();
            $table->dateTime('ShippingDate')->nullable();
            $table->dateTime('DeliveryDate')->nullable();
            $table->decimal('ShippingCost', 10, 2)->nullable();
            $table->enum('Status', ['Pending', 'Shipped', 'Delivered', 'Returned'])->default('Pending');
            $table->unsignedBigInteger('StatusID');            
            $table->timestamps();

            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->foreign('ProviderID')->references('ProviderID')->on('shippingproviders');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};