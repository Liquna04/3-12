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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CustomerID');
            $table->string('full_name', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('email', 100)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('phone', 15)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('password_hash', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('address', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->string('profile_picture', 255)->charset('utf8mb4')->collation('utf8mb4_general_ci')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};