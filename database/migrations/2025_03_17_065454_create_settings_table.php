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
        Schema::create('settings', function (Blueprint $table) {
            $table->id('settingID');
            $table->string('banner');
            $table->string('linkSlide')->nullable();
            $table->string('Slide')->nullable();
            $table->string('linkFB')->nullable();
            $table->string('Shopname')->nullable();
            $table->string('linkIG')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
