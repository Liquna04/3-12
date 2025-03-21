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
        Schema::create('returns', function (Blueprint $table) {
            $table->id('ReturnID'); // Auto-incrementing primary key
            $table->unsignedBigInteger('OrderID')->nullable();
            $table->unsignedBigInteger('ProductID')->nullable();
            $table->text('Reason')->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->enum('Status', ['Pending', 'Approved', 'Rejected'])
                  ->charset('utf8mb4')->collation('utf8mb4_general_ci')
                  ->nullable();
            $table->timestamp('CreatedAt')->useCurrent();
            
            // Add foreign keys if needed
            $table->foreign('OrderID')->references('OrderID')->on('orders');
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
        Schema::dropIfExists('returns');
    }
};