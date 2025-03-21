<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('CartID'); // Tự động tạo khóa chính (auto-increment)
            $table->unsignedBigInteger('CustomerID')->nullable();
            $table->unsignedBigInteger('ProductID');
            $table->integer('Quantity');
            
            $table->timestamp('CreatedAt')->useCurrent(); // Giá trị mặc định là thời gian hiện tại
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate(); // Cập nhật khi có thay đổi
        
            // Nếu có bảng customers, thêm khóa ngoại
            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('carts');
    }
};
