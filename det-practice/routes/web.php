<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Practice\PracticeController;

// Trang chủ (Khách chưa đăng nhập có thể xem)
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Đăng ký, Đăng nhập, Đăng xuất)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Google OAuth Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Practice Routes (Yêu cầu người dùng phải đăng nhập mới được truy cập)
Route::middleware(['auth'])->prefix('practice')->name('practice.')->group(function () {
    Route::get('/types', [PracticeController::class, 'types'])->name('types');
    Route::get('/select/{typeId}', [PracticeController::class, 'select'])->name('select');
    Route::get('/show/{questionId}', [PracticeController::class, 'show'])->name('show');
    Route::post('/submit', [PracticeController::class, 'submit'])->name('submit');
    Route::get('/result/{attemptId}', [PracticeController::class, 'result'])->name('result');
    
    // Quản lý đánh dấu câu hỏi yếu và lịch sử luyện tập
    Route::post('/bookmark', [PracticeController::class, 'toggleBookmark'])->name('bookmark');
    Route::get('/bookmarks', [PracticeController::class, 'bookmarks'])->name('bookmarks');
    Route::get('/history', [PracticeController::class, 'history'])->name('history');
});