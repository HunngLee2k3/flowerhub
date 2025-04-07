<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\EmailController;

// Trang khách hàng (Frontend)
Route::get('/', [HomeController::class, 'index'])->name('home'); // Trang chủ
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Danh sách sản phẩm
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // Chi tiết sản phẩm

// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Xem giỏ hàng
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add'); // Thêm sản phẩm vào giỏ
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Cập nhật số lượng
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Xóa sản phẩm khỏi giỏ

// Đặt hàng
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout'); // Trang thanh toán
Route::post('/order', [OrderController::class, 'store'])->name('order.store'); // Xử lý đặt hàng

// Quản trị (Admin Panel)
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');

    // Route cho thêm/sửa/xóa sản phẩm
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
});

// Địa chỉ
Route::middleware('auth')->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
});

Route::get('/test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email', function ($message) {
        $message->to('nguoihung448@gmail.com')->subject('Test Email');
    });
    return 'Email sent!';
});

Route::middleware('auth')->group(function () {
    Route::get('/orders/history', [OrderHistoryController::class, 'index'])->name('orders.history');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


