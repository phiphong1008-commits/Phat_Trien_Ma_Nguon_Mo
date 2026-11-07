@extends('layouts.app')

@section('title', 'Câu hỏi đã lưu & Dạng bài quan tâm - DET Practice')

@push('styles')
<style>
    .bookmark-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 10px 0 50px;
    }
    .skill-tab-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 18px;
        font-weight: 700;
        font-size: 14px;
        color: var(--bento-muted);
        text-decoration: none;
        border-bottom: 2.5px solid transparent;
        transition: all 0.2s ease;
    }
    .skill-tab-item:hover {
        color: var(--bento-orange);
    }
    .skill-tab-item.active {
        color: var(--bento-orange);
        border-bottom-color: var(--bento-orange);
        background: #f0fdf4;
        border-radius: 8px 8px 0 0;
    }
    .stat-badge-chip {
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 10px;
        background: var(--bento-line);
        color: #475569;
        font-weight: 800;
    }
    .skill-tab-item.active .stat-badge-chip {
        background: var(--bento-orange);
        color: #ffffff;
    }
    .view-mode-tab {
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        color: #475569;
        border: 1px solid var(--bento-line);
        background: #ffffff;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }
    .view-mode-tab:hover {
        border-color: var(--bento-orange);
        color: var(--bento-orange);
    }
    .view-mode-tab.active {
        background: var(--bento-orange);
        color: #ffffff;
        border-color: var(--bento-orange);
        box-shadow: 0 2px 6px rgba(0, 184, 107, 0.25);
    }
    .bm-row {
        transition: background-color 0.2s ease;
    }
    .bm-row:hover {
        background-color: var(--bento-subtle);
    }
</style>
@endpush

@section('content')
<div class="bookmark-container">

    {{-- HEADER TRANG --}}
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                <h1 style="font-size: 26px; font-weight: 800; color: var(--bento-heading); margin: 0;">
                    Câu hỏi đã lưu & Dạng bài quan tâm
                </h1>
            </div>
            <p style="color: var(--bento-muted); font-size: 14px; margin: 0;">
                Tập hợp các câu hỏi bạn đánh dấu xem lại và các dạng bài cần ưu tiên luyện tập để nâng cao band điểm Duolingo English Test (DET).
            </p>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            @if($stats['total'] > 0)
                <a href="{{ route('practice.bookmarks.practice', ['skill' => $selectedSkill]) }}" class="btn btn-primary" style="font-weight: 700;">
                    Luyện tập các câu đã lưu
                </a>
            @endif
            <a href="{{ route('practice.select') }}" class="btn btn-outline btn-sm" style="display: inline-flex; align-items: center; gap: 6px;">
                Danh sách dạng bài
            </a>
        </div>
    </div>

    {{-- THÔNG BÁO FLASH MESSAGE --}}
    @if(session('status') || session('success'))
        <div style="background: #f0fdf4; border: 1.5px solid #86efac; color: #166534; padding: 12px 18px; border-radius: 10px; margin-bottom: 20px; font-weight: 600; display: flex; align-items: center; gap: 8px;">
            <span>✓</span>
            <span>{{ session('status') ?? session('success') }}</span>
        </div>
    @endif
    @if(session('error') || session('warning'))
        <div style="background: #fef2f2; border: 1.5px solid #fca5a5; color: #991b1b; padding: 12px 18px; border-radius: 10px; margin-bottom: 20px; font-weight: 600; display: flex; align-items: center; gap: 8px;">
            <span>⚠️</span>
            <span>{{ session('error') ?? session('warning') }}</span>
        </div>
    @endif

    {{-- KHUNG LƯU NHANH CÂU HỎI THEO ID --}}
    <div class="card" style="padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; background: #ffffff; border: 1.5px solid var(--bento-line);">
        <form method="POST" action="{{ route('practice.bookmarks.store') }}" style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            @csrf
            <div style="font-weight: 700; font-size: 14px; color: var(--bento-heading); display: flex; align-items: center; gap: 6px;">
                <span>⭐</span>
                <span>Lưu nhanh câu hỏi:</span>
            </div>
            <div style="flex: 1; min-width: 220px; max-width: 320px;">
                <input type="number" 
                       name="cauhoi_id" 
                       min="1" 
                       required 
                       placeholder="Nhập ID câu hỏi (VD: 1, 2, 3...)" 
                       class="form-control" 
                       style="font-size: 14px; padding: 8px 12px; width: 100%;">
            </div>
            <button type="submit" class="btn btn-primary btn-sm" style="font-weight: 700; padding: 9px 18px;">
                + Lưu câu hỏi
            </button>
            <span style="font-size: 12px; color: var(--bento-muted);">
                (Lưu câu hỏi để gom vào danh sách ôn tập cá nhân)
            </span>
        </form>
    </div>

    {{-- 4 THẺ THỐNG KÊ KỸ NĂNG DET --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px; margin-bottom: 24px;">
        @foreach($skillMeta as $sKey => $sMeta)
            @php $count = $stats[$sKey] ?? 0; @endphp
            <div class="card" style="margin-bottom: 0; padding: 16px 18px; border-radius: 12px; border: 1.5px solid {{ $sMeta['border'] }}; background: {{ $sMeta['bg'] }};">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div>
                            <span style="font-size: 12px; font-weight: 700; color: {{ $sMeta['color'] }}; text-transform: uppercase; display: block;">
                                {{ $sMeta['short'] }}
                            </span>
                            <span style="font-size: 13px; font-weight: 700; color: var(--bento-heading);">
                                {{ ucfirst($sKey) }}
                            </span>
                        </div>
                    </div>
                    <div style="font-size: 24px; font-weight: 800; color: {{ $sMeta['color'] }};">
                        {{ $count }}
                        <span style="font-size: 12px; font-weight: 600; color: var(--bento-muted);">câu</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- TAB CHUYỂN ĐỔI: CÂU HỎI ĐÃ LƯU VS DẠNG BÀI ĐÃ LƯU --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('practice.bookmarks', array_merge(request()->query(), ['tab' => 'questions'])) }}" 
               class="view-mode-tab {{ $activeTab === 'questions' ? 'active' : '' }}">
                <span>Câu hỏi đã lưu</span>
                <span class="stat-badge-chip">{{ $stats['total'] }}</span>
            </a>
            <a href="{{ route('practice.bookmarks', array_merge(request()->query(), ['tab' => 'types'])) }}" 
               class="view-mode-tab {{ $activeTab === 'types' ? 'active' : '' }}">
                <span>Dạng bài quan tâm</span>
                <span class="stat-badge-chip">{{ $savedTypes->count() }}</span>
            </a>
        </div>
    </div>

    {{-- TAB 1: CÂU HỎI ĐÃ LƯU --}}
    @if($activeTab === 'questions')

        {{-- BỘ LỌC KỸ NĂNG THEO TAB --}}
        <div style="background: #ffffff; border: 1px solid var(--bento-line); border-radius: 12px 12px 0 0; border-bottom: none; display: flex; overflow-x: auto; padding: 6px 12px 0;">
            <a href="{{ route('practice.bookmarks', array_merge(request()->except(['page']), ['skill' => 'all'])) }}" 
               class="skill-tab-item {{ $selectedSkill === 'all' ? 'active' : '' }}">
                <span>Tất cả</span>
                <span class="stat-badge-chip">{{ $stats['total'] }}</span>
            </a>
            @foreach($skillMeta as $sKey => $sMeta)
                <a href="{{ route('practice.bookmarks', array_merge(request()->except(['page']), ['skill' => $sKey])) }}" 
                   class="skill-tab-item {{ $selectedSkill === $sKey ? 'active' : '' }}">
                    <span>{{ $sMeta['short'] }}</span>
                    <span class="stat-badge-chip">{{ $stats[$sKey] ?? 0 }}</span>
                </a>
            @endforeach
        </div>

        {{-- THANH CÔNG CỤ TÌM KIẾM & BỘ LỌC CHI TIẾT --}}
        <div class="card" style="margin-top: 0; border-radius: 0 0 12px 12px; padding: 18px 20px; margin-bottom: 22px; border-top: 1px solid #f1f5f9;">
            <form method="GET" action="{{ route('practice.bookmarks') }}" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) auto; gap: 12px; align-items: flex-end;">
                <input type="hidden" name="tab" value="questions">
                <input type="hidden" name="skill" value="{{ $selectedSkill }}">

                {{-- Lọc theo Dạng bài --}}
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 6px;">
                        Dạng bài luyện tập:
                    </label>
                    <select name="loai_id" class="form-control" style="font-size: 14px; padding: 9px 12px;">
                        <option value="">-- Tất cả dạng bài --</option>
                        @foreach($types as $t)
                            @if($selectedSkill === 'all' || $t->kynang === $selectedSkill)
                                <option value="{{ $t->id }}" {{ $selectedLoai == $t->id ? 'selected' : '' }}>
                                    [{{ ucfirst($t->kynang) }}] {{ $t->ten }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{-- Lọc theo Độ khó --}}
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 6px;">
                        Cấp độ độ khó:
                    </label>
                    <select name="dokho" class="form-control" style="font-size: 14px; padding: 9px 12px;">
                        <option value="">-- Tất cả cấp độ (1 - 10) --</option>
                        @for($d = 1; $d <= 10; $d++)
                            <option value="{{ $d }}" {{ $selectedDokho == $d ? 'selected' : '' }}>
                                Cấp độ {{ $d }} ({{ $d <= 3 ? 'Dễ' : ($d <= 7 ? 'Vừa' : 'Khó') }})
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- Tìm kiếm từ khóa --}}
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #475569; margin-bottom: 6px;">
                        Từ khóa tìm kiếm câu hỏi:
                    </label>
                    <input type="text" 
                           name="q" 
                           value="{{ $keyword }}" 
                           placeholder="Nhập nội dung câu hỏi..." 
                           class="form-control" 
                           style="font-size: 14px; padding: 9px 12px;">
                </div>

                {{-- Nút bấm Lọc & Reset --}}
                <div style="display: flex; gap: 8px;">
                    <button type="submit" class="btn btn-primary btn-sm" style="padding: 10px 18px; font-weight: 700;">
                         Lọc
                    </button>
                    @if($selectedLoai || $selectedDokho || $keyword || $selectedSkill !== 'all')
                        <a href="{{ route('practice.bookmarks', ['tab' => 'questions']) }}" class="btn btn-outline btn-sm" style="padding: 10px 14px;" title="Xóa bộ lọc">
                            ✕
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- DANH SÁCH BẢNG CÂU HỎI ĐÃ LƯU --}}
        @if($bookmarks->isEmpty())
            <div class="card" style="text-align: center; padding: 50px 20px; border-radius: 14px;">
                <h3 style="font-size: 18px; color: var(--bento-heading); margin-bottom: 6px;">
                    @if($selectedSkill !== 'all' || $selectedLoai || $selectedDokho || $keyword)
                        Không tìm thấy câu hỏi đã lưu phù hợp với bộ lọc
                    @else
                        Bạn chưa lưu câu hỏi nào
                    @endif
                </h3>
                <p style="color: var(--bento-muted); font-size: 14px; margin-bottom: 20px; max-width: 500px; margin-left: auto; margin-right: auto;">
                    Khi đang làm bài luyện tập hoặc xem kết quả, bạn có thể nhấn vào nút <strong>"☆ Lưu câu hỏi"</strong> để lưu lại các câu cần ôn luyện.
                </p>
                <div style="display: flex; justify-content: center; gap: 10px;">
                    @if($selectedSkill !== 'all' || $selectedLoai || $selectedDokho || $keyword)
                        <a href="{{ route('practice.bookmarks', ['tab' => 'questions']) }}" class="btn btn-outline">
                            Xóa bộ lọc tìm kiếm
                        </a>
                    @else
                        <a href="{{ route('practice.select') }}" class="btn btn-primary">
                            Bắt đầu luyện tập ngay 
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="card" style="padding: 0; overflow: hidden; border-radius: 14px; border: 1px solid var(--bento-line); margin-bottom: 24px;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="background: var(--bento-subtle); border-bottom: 1.5px solid var(--bento-line); color: #475569; font-weight: 700; font-size: 13px; text-transform: uppercase;">
                                <th style="padding: 14px 18px;">Mã & Độ khó</th>
                                <th style="padding: 14px 18px;">Kỹ năng & Dạng bài</th>
                                <th style="padding: 14px 18px;">Nội dung câu hỏi</th>
                                <th style="padding: 14px 18px;">Ngày lưu</th>
                                <th style="padding: 14px 18px; text-align: right;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookmarks as $bm)
                                @php
                                    $kynang = $bm->kynang ?? 'reading';
                                    $sm = $skillMeta[$kynang] ?? $skillMeta['reading'];
                                    $dokho = $bm->dokho ?? 5;
                                    $dokhoBadgeBg = $dokho <= 3 ? '#dcfce7' : ($dokho <= 7 ? '#fef9c3' : '#fee2e2');
                                    $dokhoColor = $dokho <= 3 ? '#166534' : ($dokho <= 7 ? '#854d0e' : '#991b1b');
                                    $dokhoLabel = $dokho <= 3 ? 'Dễ' : ($dokho <= 7 ? 'Vừa' : 'Khó');
                                @endphp
                                <tr class="bm-row" id="bm-row-{{ $bm->cauhoi_id }}" style="border-bottom: 1px solid #f1f5f9;">
                                    
                                    {{-- Cột 1: Mã câu & Độ khó --}}
                                    <td style="padding: 14px 18px; white-space: nowrap;">
                                        <div style="font-weight: 800; color: #0f172a; font-size: 15px; margin-bottom: 4px;">
                                            #{{ $bm->cauhoi_id }}
                                        </div>
                                        <span style="font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: {{ $dokhoBadgeBg }}; color: {{ $dokhoColor }};">
                                            Cấp độ {{ $dokho }}/10 • {{ $dokhoLabel }}
                                        </span>
                                    </td>

                                    {{-- Cột 2: Kỹ năng & Dạng bài --}}
                                    <td style="padding: 14px 18px; white-space: nowrap;">
                                        <span class="badge {{ $sm['badge'] }}" style="font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px; display: inline-flex; align-items: center; gap: 4px;">
                                            <span>{{ $sm['short'] }}</span>
                                        </span>
                                        <div style="font-size: 13px; font-weight: 700; color: var(--bento-heading); margin-top: 2px;">
                                            {{ $bm->loai_ten ?? 'Tổng hợp' }}
                                        </div>
                                    </td>

                                    {{-- Cột 3: Nội dung câu hỏi --}}
                                    <td style="padding: 14px 18px; color: var(--bento-ink); max-width: 380px;">
                                        <div style="line-height: 1.5; font-size: 14px; font-weight: 600; color: var(--bento-heading); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ $bm->cauhoi->noidung ?? ('Câu hỏi ID #' . $bm->cauhoi_id) }}
                                        </div>
                                        <div style="margin-top: 4px; display: flex; gap: 8px; align-items: center; font-size: 12px; color: var(--bento-muted);">
                                            @if(!empty($bm->cauhoi->audio))
                                                <span style="color: #7c3aed; font-weight: 700;">Kèm âm thanh</span>
                                            @endif
                                            @if(!empty($bm->cauhoi->anh))
                                                <span style="color: #0284c7; font-weight: 700;">Kèm hình ảnh</span>
                                            @endif
                                            <span>Điểm: {{ $bm->cauhoi->diem ?? 1 }}đ</span>
                                        </div>
                                    </td>

                                    {{-- Cột 4: Ngày lưu --}}
                                    <td style="padding: 14px 18px; color: var(--bento-muted); font-size: 13px; white-space: nowrap;">
                                        {{ date('d/m/Y H:i', strtotime($bm->ngaytao)) }}
                                    </td>

                                    {{-- Cột 5: Hành động --}}
                                    <td style="padding: 14px 18px; text-align: right; white-space: nowrap;">
                                        <div style="display: inline-flex; gap: 6px; align-items: center;">
                                            <a href="{{ route('practice.show', $bm->cauhoi_id) }}" 
                                               class="btn btn-primary btn-sm" 
                                               style="font-size: 13px; font-weight: 700; padding: 6px 12px;">
                                                Luyện câu này
                                            </a>

                                            @if(!empty($bm->cauhoi->loai_id))
                                                <a href="{{ route('practice.session', ['loai_id' => $bm->cauhoi->loai_id]) }}" 
                                                   class="btn btn-outline btn-sm" 
                                                   style="font-size: 13px; font-weight: 600; padding: 6px 10px;"
                                                   title="Luyện tập tất cả câu thuộc dạng bài này">
                                                    Dạng này
                                                </a>
                                            @endif

                                            <!-- Nút Bỏ lưu câu hỏi (Chuẩn No-JS) -->
                                            <form method="POST" action="{{ route('practice.bookmark.toggle', $bm->cauhoi_id) }}" style="display: inline-block; margin: 0;">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-outline btn-sm" 
                                                        style="color: #ef4444; border-color: #fca5a5; font-size: 12px; padding: 6px 10px;" 
                                                        title="Bỏ lưu câu hỏi này">
                                                    ✕
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PHÂN TRANG --}}
            <div style="display: flex; justify-content: center; margin-top: 10px;">
                {{ $bookmarks->links('partials.pagination') }}
            </div>
        @endif

    {{-- TAB 2: DẠNG BÀI ĐÃ LƯU --}}
    @else
        <div style="margin-bottom: 20px;">
            <p style="color: var(--bento-muted); font-size: 14px;">
                Danh sách các dạng bài luyện tập Duolingo English Test bạn đã đánh dấu để tập trung rèn luyện:
            </p>
        </div>

        @if($savedTypes->isEmpty())
            <div class="card" style="text-align: center; padding: 50px 20px; border-radius: 14px;">
                <h3 style="font-size: 18px; color: var(--bento-heading); margin-bottom: 6px;">
                    Bạn chưa lưu dạng bài nào
                </h3>
                <p style="color: var(--bento-muted); font-size: 14px; margin-bottom: 20px; max-width: 500px; margin-left: auto; margin-right: auto;">
                    Tại trang chọn dạng bài luyện tập, bạn có thể nhấn nút <strong>"Lưu dạng bài"</strong> trên mỗi thẻ để lưu các dạng bài trọng tâm vào đây.
                </p>
                <a href="{{ route('practice.select') }}" class="btn btn-primary">
                    Khám phá các dạng bài luyện tập →
                </a>
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 18px;">
                @foreach($savedTypes as $st)
                    @php
                        $stMeta = $skillMeta[$st->kynang] ?? $skillMeta['reading'];
                    @endphp
                    <div class="card" id="saved-type-card-{{ $st->id }}" style="border-radius: 14px; border: 1.5px solid var(--bento-line); padding: 22px; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.2s;">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                <span class="badge {{ $stMeta['badge'] }}" style="font-size: 11px; font-weight: 700; text-transform: uppercase;">
                                    {{ $stMeta['name'] }}
                                </span>
                                <!-- Nút Bỏ lưu dạng bài (Chuẩn No-JS) -->
                                <form method="POST" action="{{ route('practice.bookmark.type.toggle', $st->id) }}" style="display: inline-block; margin: 0;">
                                    @csrf
                                    <button type="submit" 
                                            class="btn btn-outline btn-sm" 
                                            style="color: #ef4444; border-color: #fca5a5; font-size: 11px; padding: 3px 8px;"
                                            title="Bỏ lưu dạng bài này">
                                        ✕ Bỏ lưu
                                    </button>
                                </form>
                            </div>

                            <h3 style="font-size: 18px; font-weight: 800; color: var(--bento-heading); margin: 0 0 8px 0;">
                                {{ $st->ten }}
                            </h3>

                            <p style="color: var(--bento-muted); font-size: 13px; line-height: 1.5; margin: 0 0 16px 0;">
                                {{ $st->mota ?: 'Rèn luyện các câu hỏi chuẩn định dạng Duolingo English Test.' }}
                            </p>
                        </div>

                        <div style="border-top: 1px solid #f1f5f9; padding-top: 14px; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 13px; color: var(--bento-muted); font-weight: 600;">
                                {{ $st->question_count }} câu trong ngân hàng
                            </span>

                            <a href="{{ route('practice.session', ['loai_id' => $st->id]) }}" class="btn btn-primary btn-sm" style="font-weight: 700;">
                                Bắt đầu làm ngay 
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

</div>
@endsection
