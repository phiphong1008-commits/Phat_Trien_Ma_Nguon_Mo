@extends('layouts.app')

@section('content')
<div class="exam-container">
    <h2>Làm Bài Luyện Tập</h2>
    <form action="{{ route('practice.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="cauhoi_id" value="{{ $question->id }}">
        <input type="hidden" name="dap_an_dung" value="{{ $question->dap_an }}">

        <div class="question-box">
            <p><strong>Câu hỏi:</strong> Điền đáp án đúng cho câu hỏi này.</p>
        </div>

        <div class="form-group">
            <label>Câu trả lời của bạn:</label>
            <input type="text" name="cautraloi" required class="form-control">
        </div>

        <button type="submit" class="btn-submit">Nộp bài</button>
    </form>

    <form action="{{ route('practice.bookmark') }}" method="POST" style="margin-top: 10px;">
        @csrf
        <input type="hidden" name="cauhoi_id" value="{{ $question->id }}">
        <button type="submit" class="btn-bookmark">⭐ Đánh dấu câu này</button>
    </form>
</div>
@endsection