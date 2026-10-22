@extends('layouts.app')

@section('content')
<div class="history-container">
    <h2>Lịch Sử Luyện Tập</h2>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Lượt làm</th>
                <th>Mã câu hỏi</th>
                <th>Câu trả lời</th>
                <th>Kết quả</th>
                <th>Điểm</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attempts as $attempt)
                <tr>
                    <td>#{{ $attempt->id }}</td>
                    <td>{{ $attempt->cauhoi_id }}</td>
                    <td>{{ $attempt->cautraloi }}</td>
                    <td>
                        @if($attempt->is_correct)
                            <span class="badge bg-success">Đúng</span>
                        @else
                            <span class="badge bg-danger">Sai</span>
                        @endif
                    </td>
                    <td>{{ $attempt->diem }}</td>
                    <td>{{ $attempt->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Bạn chưa thực hiện lượt luyện tập nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection