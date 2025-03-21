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
        Schema::create('shippingproviders', function (Blueprint $table) {
            $table->id('ProviderID'); // Auto-incrementing primary key
            $table->string('ProviderName', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('Token', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('ClientID', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->tinyInteger('IsRecipientPays')->default(1);
            $table->decimal('ShippingCost', 10, 2)->nullable();
            $table->string('EstimatedDeliveryTime', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->text('ServiceDetails')->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->text('DeliveryTimeByRegion')->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippingproviders');
    }
};