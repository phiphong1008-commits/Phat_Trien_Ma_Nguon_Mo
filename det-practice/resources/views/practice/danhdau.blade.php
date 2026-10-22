@extends('layouts.app')

@section('content')
<div class="bookmark-container">
    <h2>Danh Sách Câu Hỏi Đã Đánh Dấu</h2>
    
    @if($bookmarks->isEmpty())
        <p>Bạn chưa đánh dấu câu hỏi nào.</p>
    @else
        <div class="bookmark-list">
            @foreach($bookmarks as $bookmark)
                <div class="bookmark-item card card-body mb-3">
                    <h4>Câu hỏi #{{ $bookmark->cauhoi_id }}</h4>
                    <p>Ngày đánh dấu: {{ $bookmark->created_at->format('d/m/Y H:i') }}</p>
                    <div class="actions">
                        <a href="{{ route('practice.show', $bookmark->cauhoi_id) }}" class="btn btn-primary">Làm lại câu này</a>
                        <form action="{{ route('practice.bookmark') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="cauhoi_id" value="{{ $bookmark->cauhoi_id }}">
                            <button type="submit" class="btn btn-danger">Xóa khỏi danh sách</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection