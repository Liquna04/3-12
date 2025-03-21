<?php

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('AdminID'); // Tự động tạo khóa chính (auto-increment)
            $table->string('FullName', 100)->nullable();
            $table->string('Email', 100)->unique();
            $table->string('Phone', 15)->nullable();
            $table->string('PasswordHash', 255);
            $table->enum('AccessLevel', ['Full Access', 'Limited Access'])->nullable();
            $table->string('ProfilePicture', 255)->nullable();
            $table->dateTime('CreatedAt')->default(FacadesDB::raw('CURRENT_TIMESTAMP'));
            $table->enum('Role', ['SuperAdmin', 'Admin', 'Moderator'])->nullable();
            $table->text('Permissions')->nullable();
            $table->boolean('CanEditProducts')->default(0);
            $table->boolean('CanDeleteProducts')->default(0);
            $table->boolean('CanEditOrders')->default(0);
            $table->boolean('CanDeleteOrders')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
               Schema::dropIfExists('admins');

    }
};
