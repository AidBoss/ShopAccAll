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
        // bảng tài khoản 
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('server', 20);
            $table->string('ar', 2);
            $table->string('nameAccount', 100);
            $table->string('passAccount', 100);
            $table->string('status', 1);
            $table->foreignId('account_type_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }
    // $table->foreignId('discount_id')->constrained('discounts');
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
