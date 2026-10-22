<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->id();
            $table->string('hovaten', 255)->nullable();
            $table->string('email', 150)->unique();
            $table->string('matkhau')->nullable(); // Để null nếu đăng nhập qua Google OAuth
            $table->string('google_id', 100)->unique()->nullable();
            $table->enum('vaitro', ['admin', 'hocvien'])->default('hocvien');
            $table->enum('trangthai', ['active', 'locked'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};