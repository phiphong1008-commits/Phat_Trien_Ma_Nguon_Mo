<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Dữ liệu mẫu cho MT01/MT02 của TV2.
        // Seeder tự bỏ qua nếu các bảng câu hỏi/đề thi chưa tồn tại.
        $this->call([
            MockTestDataSeeder::class,
        ]);
    }
}
