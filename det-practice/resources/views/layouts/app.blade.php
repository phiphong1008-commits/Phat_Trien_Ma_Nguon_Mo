<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>DET Practice - Luyện thi Duolingo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="/">Trang Chủ</a>
            @auth
                <a href="{{ route('practice.types') }}">Luyện Tập</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-link">Đăng xuất</button>
                </form>
            @else
                <a href="{{ route('login') }}">Đăng Nhập</a>
                <a href="{{ route('register') }}">Đăng Ký</a>
            @endauth
        </nav>s
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>