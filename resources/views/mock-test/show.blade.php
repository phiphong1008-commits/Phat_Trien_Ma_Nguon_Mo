
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phien thi - DET Practice</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <main class="container" style="padding: 50px 0">
        <h1>Phiên thi #{{ $lanThi->id }}</h1>

        <div class="card">
            <p>Mã đề thi: {{ $lanThi->dethi_id }}</p>
            <p>Trạng thái: {{ $lanThi->trangthai }}</p>
            <p>
                Bắt đầu:
                {{ $lanThi->batdau?->format('d/m/Y H:i:s') }}
            </p>
            <p>Độ khó: {{ $lanThi->dokho_hientai }}</p>

            <p>
                Chức năng làm câu hỏi sẽ được
                triển khai trong MT02.
            </p>
        </div>
    </main>
</body>
</html>
