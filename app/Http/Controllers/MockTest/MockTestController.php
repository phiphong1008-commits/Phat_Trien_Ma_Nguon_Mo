<?php

namespace App\Http\Controllers\MockTest;

use App\Http\Controllers\Controller;
use App\Models\Lanthi;
use App\Services\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MockTestController extends Controller
{
    // MT01: Danh sách đề thi đã xuất bản
    public function index()
    {
        $deThi = DB::table('dethi')
            ->where('trangthai', 'published')
            ->orderBy('id')
            ->get();

        return view('mock-test.index', compact('deThi'));
    }

    // MT01: Bắt đầu thi
    public function start(Request $request, TestService $testService)
    {
        $validated = $request->validate([
            'dethi_id' => ['required', 'integer', 'exists:dethi,id'],
        ]);

        $lanThi = $testService->batDauThi(
            (int) $request->user()->getAuthIdentifier(),
            (int) $validated['dethi_id']
        );

        return redirect()->route('mock-test.show', [
            'id' => $lanThi->id,
        ]);
    }

    // Hiển thị phiên thi
    public function show(Request $request, int $id)
    {
        $lanThi = Lanthi::findOrFail($id);

        abort_unless(
            (int) $lanThi->nguoidung_id ===
            (int) $request->user()->getAuthIdentifier(),
            403
        );

        return view('mock-test.show', compact('lanThi'));
    }
}
