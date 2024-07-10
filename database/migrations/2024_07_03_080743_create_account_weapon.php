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
        Schema::create('account_weapon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('weapon_id')->constrained('weapons')->onDelete('cascade');
            $table->timestamps();
            // Đảm bảo rằng không có cặp account_id và weapon_id nào được lưu trùng lặp
            $table->unique(['account_id', 'weapon_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_weapon');
    }
};
