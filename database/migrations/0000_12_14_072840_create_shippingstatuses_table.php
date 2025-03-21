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
        Schema::create('shippingstatuses', function (Blueprint $table) {
            $table->id('StatusID'); // Auto-incrementing primary key
            $table->string('StatusName', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable(false);
            $table->text('Description')->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippingstatuses');
    }
};