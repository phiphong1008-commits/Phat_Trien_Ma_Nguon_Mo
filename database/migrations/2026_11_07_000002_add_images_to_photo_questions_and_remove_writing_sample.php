<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 1. Bổ sung hình ảnh cho các câu hỏi miêu tả tranh chưa có ảnh (Speak/Write About the Photo)
     * 2. Bỏ dạng bài Writing Sample khỏi hệ thống theo kế hoạch
     */
    public function up(): void
    {
        if (Schema::hasTable('cauhoi')) {
            // 1. Cập nhật ảnh cho câu hỏi gia đình sắp xếp vali trong phòng khách sạn
            DB::table('cauhoi')
                ->where('noidung', 'like', '%packing suitcases%')
                ->update(['anh' => 'images/questions/photo-family-hotel.svg']);

            // 2. Cập nhật ảnh cho câu hỏi giáo viên viết lên bảng trắng và học sinh ghi chép
            DB::table('cauhoi')
                ->where('noidung', 'like', '%writing on a whiteboard%')
                ->update(['anh' => 'images/questions/photo-classroom-teacher.svg']);
        }

        // 3. Loại bỏ dạng bài writing_sample khỏi bảng loaicauhoi nếu có
        if (Schema::hasTable('loaicauhoi')) {
            $writingSample = DB::table('loaicauhoi')->where('ma', 'writing_sample')->first();
            if ($writingSample) {
                // Chuyển các câu hỏi liên quan sang dạng bài viết chuẩn khác (read_then_write hoặc write_about_topic)
                $targetLoaiId = DB::table('loaicauhoi')
                    ->whereIn('ma', ['read_then_write', 'write_about_topic'])
                    ->value('id');

                if ($targetLoaiId && Schema::hasTable('cauhoi')) {
                    DB::table('cauhoi')
                        ->where('loai_id', $writingSample->id)
                        ->update(['loai_id' => $targetLoaiId]);
                }

                // Xóa dạng bài writing_sample
                DB::table('loaicauhoi')->where('id', $writingSample->id)->delete();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Giữ nguyên an toàn dữ liệu
    }
};
