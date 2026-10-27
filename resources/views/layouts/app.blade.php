<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'DET Practice')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    @stack('styles')
</head>

<body class="fox-site @yield('body_class')">
    <div class="site-shell">

        <header class="glass navbar">
            <a href="{{ url('/') }}" class="brand">
                <img src="{{ asset('images/fox-logo.jpg') }}"
                     alt="Linh vật cáo DET Practice">
                <span><b>DET</b> Practice</span>
            </a>

            <nav class="nav-links" aria-label="Điều hướng chính">
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'active' : '' }}">
                    Trang chủ
                </a>

                <a href="{{ route('mock-test.index') }}"
                   class="{{ request()->is('mock-test*') ? 'active' : '' }}">
                    Thi thử
                </a>

                <a href="{{ route('practice.index') }}"
                   class="{{ request()->is('practice*') ? 'active' : '' }}">
                    Luyện tập
                </a>

                @auth
                    @if (auth()->user()->vaitro === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="{{ request()->is('admin*') ? 'active' : '' }}">
                            Quản trị
                        </a>
                    @else
                        <span class="nav-unavailable">Dashboard</span>
                    @endif
                @endauth
            </nav>

            <div class="nav-account">
                @auth
                    <span>
                        Xin chào, {{ auth()->user()->hoten ?? 'Học viên' }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="fox-logout">
                            Đăng xuất
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Đăng nhập</a>
                    <a href="{{ route('register') }}">Đăng ký</a>
                @endauth
            </div>
        </header>

        <main class="app-main fox-main @yield('main_class')">
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="footer">
            <span>© {{ date('Y') }} DET Practice</span>
            <span>Learn at your own pace.</span>
        </footer>

    </div>

    @stack('scripts')
</body>
</html>
