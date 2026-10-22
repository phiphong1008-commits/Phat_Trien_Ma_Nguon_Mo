<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('luyentap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoidung_id')->constrained('nguoidung')->onDelete('cascade');
            $table->unsignedBigInteger('cauhoi_id');
            $table->text('cautraloi')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->float('diem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('luyentap');
    }
};