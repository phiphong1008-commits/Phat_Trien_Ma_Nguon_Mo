
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DET Practice - Luyện thi tiếng Anh</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <header class="header">
        <div class="container nav">
            <a href="/" class="logo">DET Practice</a>

            <nav>
                <a href="/">Trang chủ</a>

                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Đăng nhập</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn">
                        Đăng ký
                    </a>
                @endif
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <span class="subtitle">
                    NỀN TẢNG LUYỆN THI TIẾNG ANH
                </span>

                <h1>
                    Luyện tập thông minh.<br>
                    Tự tin chinh phục DET.
                </h1>

                <p>
                    Hệ thống luyện thi Duolingo English Test
                    với ngân hàng câu hỏi, thi thử và
                    theo dõi tiến độ học tập.
                </p>

                <a href="{{ url('/mock-test') }}" class="btn">
                    Khám phá bài thi thử
                </a>
            </div>
        </section>

        <section class="features container">
            <h2>Các chức năng chính</h2>

            <div class="grid">
                <article class="card">
                    <h3>Luyện tập</h3>
                    <p>
                        Luyện kỹ năng Reading, Listening,
                        Writing và Speaking.
                    </p>
                </article>

                <article class="card">
                    <h3>Thi thử DET</h3>
                    <p>
                        Làm bài thi thử, chọn câu theo
                        mức độ và xem kết quả.
                    </p>
                </article>

                <article class="card">
                    <h3>Dashboard</h3>
                    <p>
                        Theo dõi điểm số, lịch sử thi
                        và tiến độ học tập.
                    </p>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <p>DET Practice - Dự án học tập phát triển mã nguồn mở.</p>
    </footer>

</body>
</html>
