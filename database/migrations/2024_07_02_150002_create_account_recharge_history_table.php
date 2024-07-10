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
        // bảng lịch sử nạp tiền vào web 
        Schema::create('account_recharge_history', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID tự tăng và là khóa chính
            $table->bigInteger('transaction_code')->unsigned();
            $table->string('bank_name', 50);
            $table->string('content_recharge', 50);
            $table->decimal('amount', 10, 2);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_recharge_history');
    }
};