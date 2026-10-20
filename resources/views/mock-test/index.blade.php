
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thi thu DET Practice</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <header class="header">
        <div class="container nav">
            <a href="/" class="logo">DET Practice</a>
            <nav>
                <a href="/">Trang chủ</a>
                <a href="{{ route('mock-test.index') }}">Thi thử</a>
            </nav>
        </div>
    </header>

    <main class="container" style="padding: 50px 0">
        <h1>Danh sách đề thi thử</h1>

        @if ($errors->any())
            <div role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @forelse ($deThi as $de)
            <article class="card" style="margin-bottom: 20px">
                <h2>{{ $de->ten }}</h2>
                <p>{{ $de->mota }}</p>

                <p>
                    Chế độ: {{ $de->chedo }}
                    | Kiểu: {{ $de->kieu }}
                    | Thời gian: {{ ceil($de->thoigian / 60) }} phút
                </p>

                @auth
                    <form method="POST"
                          action="{{ route('mock-test.start') }}">
                        @csrf

                        <input type="hidden"
                               name="dethi_id"
                               value="{{ $de->id }}">

                        <button type="submit" class="btn">
                            Bắt đầu thi
                        </button>
                    </form>
                @else
                    <p>Vui lòng đăng nhập để bắt đầu thi.</p>
                @endauth
            </article>
        @empty
            <p>Hiện chưa có đề thi nào được xuất bản.</p>
        @endforelse
    </main>
</body>
</html>
