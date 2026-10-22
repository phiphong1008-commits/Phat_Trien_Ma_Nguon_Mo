@extends('layouts.app')

@section('content')
<div class="practice-container">
    <h2>Chọn Dạng Bài Luyện Tập</h2>
    <div class="type-grid">
        <div class="type-card">
            <h3>Read and Complete</h3>
            <p>Điền từ còn thiếu vào đoạn văn.</p>
            <a href="{{ route('practice.select', ['typeId' => 'read-complete']) }}" class="btn">Luyện ngay</a>
        </div>
        <div class="type-card">
            <h3>Read Aloud</h3>
            <p>Đọc to đoạn văn bản hiển thị trên màn hình.</p>
            <a href="{{ route('practice.select', ['typeId' => 'read-aloud']) }}" class="btn">Luyện ngay</a>
        </div>
    </div>
</div>
@endsection