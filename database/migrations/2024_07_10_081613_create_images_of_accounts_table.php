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
        Schema::create('images_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id'); // Trường khóa ngoại
            $table->string('path'); // Đường dẫn tới file ảnh
            $table->timestamps();
            // Thiết lập khoá ngoại
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_of_accounts');
    }
};
