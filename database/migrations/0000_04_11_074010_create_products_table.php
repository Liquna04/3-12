<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID'); // Auto-incrementing primary key
            $table->string('Name', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('Description')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->decimal('Price', 10, 2)->nullable();
            $table->integer('Stock')->nullable();
            $table->unsignedBigInteger('CategoryID')->nullable();
            $table->string('ImageURL', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->tinyInteger('IsVisible')->default(1);
            $table->integer('SalesCount')->default(0);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();
            
            // Add foreign key if needed
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}