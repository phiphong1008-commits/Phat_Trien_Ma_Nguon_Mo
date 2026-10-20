<?php

namespace App\Services;

use App\Models\Lanthi;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TestService
{
    /**
     * MT01: Bắt đầu một lần thi thử.
     */
    public function batDauThi(int $nguoiDungId, int $deThiId): Lanthi
    {
        return DB::transaction(function () use ($nguoiDungId, $deThiId) {

            // 1. Khóa bản ghi người dùng để tránh tạo trùng lần thi.
            $nguoiDung = DB::table('nguoidung')
                ->where('id', $nguoiDungId)
                ->lockForUpdate()
                ->first();

            if (!$nguoiDung || $nguoiDung->trangthai !== 'active') {
                throw ValidationException::withMessages([
                    'nguoidung' => 'Tài khoản không tồn tại hoặc đã bị khóa.',
                ]);
            }

            // 2. Kiểm tra đề thi đã được xuất bản.
            $deThi = DB::table('dethi')
                ->where('id', $deThiId)
                ->where('trangthai', 'published')
                ->first();

            if (!$deThi) {
                throw ValidationException::withMessages([
                    'dethi' => 'Đề thi không tồn tại hoặc chưa được xuất bản.',
                ]);
            }

            // 3. Không cho phép hai lần thi đang diễn ra.
            $lanThiDangMo = Lanthi::query()
                ->where('nguoidung_id', $nguoiDungId)
                ->where('trangthai', 'in_progress')
                ->first();

            if ($lanThiDangMo) {
                throw ValidationException::withMessages([
                    'lanthi' => 'Bạn đang có một lần thi chưa hoàn thành.',
                ]);
            }

            // 4. Khởi tạo lần thi mới.
            return Lanthi::create([
                'nguoidung_id' => $nguoiDungId,
                'dethi_id' => $deThiId,
                'dokho_hientai' => 5.00,
                'batdau' => now(),
                'trangthai' => 'in_progress',
            ]);
        }, 3);
    }
}
