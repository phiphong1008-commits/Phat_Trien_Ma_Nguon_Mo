@extends('layouts.app')

@section('content')
<div class="result-container">
    <h2>Kết Quả Luyện Tập</h2>
    <div class="result-card">
        <p><strong>Trạng thái:</strong> 
            @if($attempt->is_correct)
                <span style="color: green;">Chính xác 🎉</span>
            @else
                <span style="color: red;">Chưa chính xác ❌</span>
            @endif
        </p>
        <p><strong>Điểm số:</strong> {{ $attempt->diem }} điểm</p>
        <p><strong>Câu trả lời của bạn:</strong> {{ $attempt->cautraloi }}</p>
    </div>
    <a href="{{ route('practice.types') }}" class="btn">Tiếp tục luyện tập</a>
</div>
@endsection