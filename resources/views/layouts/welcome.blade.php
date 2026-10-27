
@extends('layouts.app')

@section('title', 'DET Practice - Luyện thi tiếng Anh')
@section('main_class', 'fox-home')

@section('content')

    <!-- Hero -->
    <section class="glass hero">
        <div class="hero-content">
            <span class="eyebrow">WELCOME TO DET PRACTICE</span>

            <h1>
                Luyện thi DET
                <span>theo cách của bạn.</span>
            </h1>

            <p>
                Bắt đầu từ một bài thi thử.
                Tiến bộ qua từng ngày.
            </p>

            <div class="hero-actions">
                <a href="{{ route('mock-test.index') }}"
                   class="btn btn-primary">
                    Khám phá đề thi
                    <span aria-hidden="true">↗</span>
                </a>

                <a href="#kham-pha" class="btn btn-glass">
                    Tìm hiểu thêm
                </a>
            </div>
        </div>

        <div class="hero-mascot">
            <div class="mascot-halo"></div>

            <img src="{{ asset('images/fox-logo.jpg') }}"
                 alt="Cáo nhỏ đồng hành cùng bạn luyện thi DET">

            <span class="mascot-caption">
                Small steps. Big progress.
            </span>
        </div>
    </section>

    <!-- Chuc nang chinh -->
    <section id="kham-pha" class="discover">
        <div class="section-heading">
            <div>
                <span class="eyebrow">BẮT ĐẦU TỪ ĐÂY</span>
                <h2>Hôm nay bạn muốn làm gì?</h2>
            </div>
        </div>

        <div class="feature-grid">

            <!-- Thi thu -->
            <a class="glass feature-card feature-primary"
               href="{{ route('mock-test.index') }}">

                <div class="feature-icon" aria-hidden="true">✦</div>

                <div class="feature-content">
                    <h3>Thi thử DET</h3>
                    <p>
                        Khám phá đề thi và bắt đầu thử sức.
                    </p>
                </div>

                <span class="feature-arrow" aria-hidden="true">↗</span>
            </a>

            <!-- Luyen tap TV1 -->
            <a class="glass feature-card"
               href="{{ route('practice.index') }}">

                <div class="feature-icon" aria-hidden="true">✎</div>

                <div class="feature-content">
                    <h3>Luyện tập kỹ năng</h3>
                    <p>
                        Cải thiện từng kỹ năng tiếng Anh
                        với các dạng bài DET.
                    </p>
                </div>

                <span class="feature-arrow" aria-hidden="true">↗</span>
            </a>

            <!-- Quan tri hoac tien do -->
            @auth
                @if (auth()->user()->vaitro === 'admin')
                    <a class="glass feature-card"
                       href="{{ route('admin.dashboard') }}">

                        <div class="feature-icon" aria-hidden="true">◉</div>

                        <div class="feature-content">
                            <h3>Quản trị hệ thống</h3>
                            <p>
                                Xem thống kê người dùng,
                                câu hỏi và đề thi.
                            </p>
                        </div>

                        <span class="feature-arrow"
                              aria-hidden="true">↗</span>
                    </a>
                @else
                    <article class="glass feature-card">
                        <div class="feature-icon"
                             aria-hidden="true">◉</div>

                        <div class="feature-content">
                            <h3>Tiến độ học tập</h3>
                            <p>
                                Theo dõi hành trình và kết quả của bạn.
                            </p>
                            <small>Đang phát triển</small>
                        </div>
                    </article>
                @endif
            @else
                <article class="glass feature-card">
                    <div class="feature-icon"
                         aria-hidden="true">◉</div>

                    <div class="feature-content">
                        <h3>Tiến độ học tập</h3>
                        <p>
                            Theo dõi hành trình và kết quả của bạn.
                        </p>
                        <small>Đang phát triển</small>
                    </div>
                </article>
            @endauth

        </div>
    </section>

@endsection
