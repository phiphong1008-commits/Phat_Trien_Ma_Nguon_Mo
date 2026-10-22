@extends('layouts.app')

@section('content')
<div class="select-container">
    <h2>Danh sách câu hỏi - Dạng: {{ $typeId }}</h2>
    <ul class="question-list">
        <li>
            <span>Câu hỏi số 1 (Độ khó: Dễ)</span>
            <a href="{{ route('practice.show', 1) }}" class="btn-sm">Làm bài</a>
        </li>
        <li>
            <span>Câu hỏi số 2 (Độ khó: Trung bình)</span>
            <a href="{{ route('practice.show', 2) }}" class="btn-sm">Làm bài</a>
        </li>
    </ul>
</div>
@endsection