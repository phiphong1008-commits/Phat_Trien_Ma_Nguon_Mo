<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Cập nhật lại đường dẫn audio cho interactive_listening và đáp án chuẩn cho listen_and_type
     * đồng bộ với file âm thanh mới của listening-1.wav ("The library closes at eight on Friday.")
     */
    public function up(): void
    {
        if (!Schema::hasTable('cauhoi')) {
            return;
        }

        // 1. Chuyển các câu hỏi hội thoại interactive_listening đang trỏ nhầm sang listening-1.wav về listening-2.wav
        $interactiveLoaiId = null;
        if (Schema::hasTable('loaicauhoi')) {
            $interactiveLoaiId = DB::table('loaicauhoi')
                ->where('ma', 'interactive_listening')
                ->value('id');
        }

        if ($interactiveLoaiId) {
            DB::table('cauhoi')
                ->where('loai_id', $interactiveLoaiId)
                ->where('audio', 'audio/questions/listening-1.wav')
                ->update(['audio' => 'audio/questions/listening-2.wav']);
        }

        // 2. Cập nhật các câu hỏi hội thoại có nội dung chứa conversation về listening-2.wav
        DB::table('cauhoi')
            ->where('audio', 'audio/questions/listening-1.wav')
            ->where('noidung', 'like', '%conversation%')
            ->update(['audio' => 'audio/questions/listening-2.wav']);

        // 3. Với câu hỏi nghe và gõ lại (listen_and_type) dùng listening-1.wav, cập nhật đáp án chuẩn
        $listenAndTypeQuestions = DB::table('cauhoi')
            ->where('audio', 'audio/questions/listening-1.wav')
            ->get();

        if (Schema::hasTable('dapan')) {
            foreach ($listenAndTypeQuestions as $q) {
                $hasAnswer = DB::table('dapan')
                    ->where('cauhoi_id', $q->id)
                    ->where('ladung', true)
                    ->exists();

                if ($hasAnswer) {
                    DB::table('dapan')
                        ->where('cauhoi_id', $q->id)
                        ->where('ladung', true)
                        ->update(['noidung' => 'The library closes at eight on Friday.']);
                } else {
                    DB::table('dapan')->insert([
                        'cauhoi_id' => $q->id,
                        'noidung' => 'The library closes at eight on Friday.',
                        'ladung' => true,
                        'thutu' => 1,
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Giữ nguyên dữ liệu an toàn
    }
};
