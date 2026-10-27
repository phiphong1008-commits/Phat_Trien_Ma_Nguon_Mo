@extends('layouts.app')

@section('title', 'Tổng quan hệ thống')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('title', 'Tổng quan')
@section('heading', 'Tổng quan hệ thống')

<section class="glass admin-intro">
    <h1>Tổng quan hệ thống</h1>
    <p>Quản lý và theo dõi hoạt động DET Practice.</p>
</section>

@section('content')
    <section class="admin-grid">
        <article class="admin-card">
            <p class="admin-card__label">Người dùng</p>
            <p class="admin-card__value">{{ number_format($thongke['nguoidung'], 0, ',', '.') }}</p>
        </article>

        <article class="admin-card">
            <p class="admin-card__label">Câu hỏi</p>
            <p class="admin-card__value">{{ number_format($thongke['cauhoi'], 0, ',', '.') }}</p>
            <p class="admin-card__hint">Đã xuất bản: {{ number_format($thongke['cauhoi_published'], 0, ',', '.') }}</p>
        </article>

        <article class="admin-card">
            <p class="admin-card__label">Đề thi</p>
            <p class="admin-card__value">{{ number_format($thongke['dethi'], 0, ',', '.') }}</p>
        </article>

        <article class="admin-card">
            <p class="admin-card__label">Lượt thi</p>
            <p class="admin-card__value">{{ number_format($thongke['lanthi'], 0, ',', '.') }}</p>
        </article>

        <article class="admin-card">
            <p class="admin-card__label">Lượt gọi AI</p>
            <p class="admin-card__value">{{ number_format($thongke['ailog'], 0, ',', '.') }}</p>
            <p class="admin-card__hint">Hôm nay: {{ number_format($thongke['ailog_homnay'], 0, ',', '.') }}</p>
        </article>
    </section>
@endsection
