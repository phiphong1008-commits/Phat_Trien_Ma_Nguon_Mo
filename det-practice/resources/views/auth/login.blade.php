@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Đăng Nhập</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu:</label>
            <input type="password" name="matkhau" required class="form-control">
        </div>
        <button type="submit" class="btn">Đăng nhập</button>
    </form>
    <p><a href="{{ route('password.request') }}">Quên mật khẩu?</a></p>
</div>
@endsection