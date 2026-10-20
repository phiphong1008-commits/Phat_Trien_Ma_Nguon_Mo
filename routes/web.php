
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MockTest\MockTestController;

Route::view('/', 'welcome');

// Trang danh sách đề thi
Route::get('/mock-test', [
    MockTestController::class, 'index'
])->name('mock-test.index');

// Các thao tác yêu cầu đăng nhập
Route::middleware('auth')->group(function () {

    Route::post('/mock-test/start', [
        MockTestController::class, 'start'
    ])->name('mock-test.start');

    Route::get('/mock-test/{id}', [
        MockTestController::class, 'show'
    ])->whereNumber('id')->name('mock-test.show');

});
