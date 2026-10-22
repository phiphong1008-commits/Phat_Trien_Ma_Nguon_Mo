@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Đăng Ký Tài Khoản</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" name="hovaten" value="{{ old('hovaten') }}" required class="form-control">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu:</label>
            <input type="password" name="matkhau" required class="form-control">
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu:</label>
            <input type="password" name="matkhau_confirmation" required class="form-control">
        </div>
        <button type="submit" class="btn">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
</div>
@endsection