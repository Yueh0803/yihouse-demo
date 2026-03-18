<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\RoomManagementController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\PaymentManagementController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Payment\PaymentController;

// 公開頁面
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/demo-spa', function () {
    return view('demo-spa');
})->name('demo.spa');

// 認證路由
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login/google', [RegisterController::class, 'loginWithGoogle'])->name('login.google');
    Route::post('/login/line', [RegisterController::class, 'loginWithLine'])->name('login.line');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// 用戶面板
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    // 會員相關
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('update');
        Route::get('/orders', function () {
            return view('dashboard.member.orders');
        })->name('orders');
    });
});

// 訂房相關
Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/search', [BookingController::class, 'search'])->name('search');
    Route::get('/available', [BookingController::class, 'availableRooms'])->name('available');
});

Route::middleware('auth')->prefix('booking')->name('booking.')->group(function () {
    Route::get('/room/{roomId}', [BookingController::class, 'create'])->name('create');
    Route::post('/store', [BookingController::class, 'store'])->name('store');
    Route::get('/payment/{orderId}', [BookingController::class, 'payment'])->name('payment');
});

// 支付相關
Route::middleware('auth')->prefix('payment')->name('payment.')->group(function () {
    Route::post('/line-pay', [PaymentController::class, 'processLinePay'])->name('line-pay');
    Route::post('/credit-card', [PaymentController::class, 'processCreditCard'])->name('credit-card');
    Route::post('/transfer', [PaymentController::class, 'processTransfer'])->name('transfer');
    Route::get('/confirm/{paymentId}', [PaymentController::class, 'confirm'])->name('confirm');
});

// 後台管理 - 需要 admin/staff 權限
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // 系統實作內容
    Route::get('/implementations', function () {
        return view('admin.implementations.index');
    })->name('implementations');
    
    // 會員記錄管理
    Route::resource('users', UserManagementController::class)->only(['index', 'edit', 'update']);
    Route::put('/users/{id}/deactivate', [UserManagementController::class, 'deactivate'])->name('users.deactivate');
    
    // IOT 智慧系統管理
    Route::get('/iot', function () {
        return view('admin.iot.index');
    })->name('iot');
    
    // 房務自動維護管理
    Route::get('/maintenance', function () {
        return view('admin.maintenance.index');
    })->name('maintenance');
    
    // 房間管理
    Route::resource('rooms', RoomManagementController::class)->except('show');
    
    // 訂單管理
    Route::get('/orders', [OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderManagementController::class, 'detail'])->name('orders.detail');
    Route::put('/orders/{id}/status', [OrderManagementController::class, 'updateStatus'])->name('orders.updateStatus');
    
    // 支付與金流管理
    Route::get('/payments', [PaymentManagementController::class, 'index'])->name('payments.index');
    Route::get('/payments/configure', [PaymentManagementController::class, 'configure'])->name('payments.configure');
    Route::post('/payments/save-config', [PaymentManagementController::class, 'saveConfig'])->name('payments.save-config');
});
