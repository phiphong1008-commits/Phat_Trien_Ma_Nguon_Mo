<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('danhdau', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoidung_id')->constrained('nguoidung')->onDelete('cascade');
            $table->unsignedBigInteger('cauhoi_id');
            $table->timestamps();

            // Đảm bảo mỗi người dùng chỉ đánh dấu 1 câu hỏi 1 lần duy nhất[cite: 4]
            $table->unique(['nguoidung_id', 'cauhoi_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('danhdau');
    }
};