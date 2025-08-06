<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dynamic products page for all categories
Route::get('/products/{category}', [ProductController::class, 'showProduct'])->name('products');

Route::get('/login', function () {
    return view('user.login');
})->name('login.form');

Route::post('/login', [UserController::class, 'userLogin'])->name('login');

Route::get('/register', function () {
    return view('user.register');
})->name('register.form');

Route::post('/register', [UserController::class, 'createUser'])->name('register');

Route::get('/forget-password', function () {
    return view('user.forget-pass');
})->name('forget-password');

Route::get('/user/home', [HomeController::class, 'userDashboard'])->name('user.home')->middleware('auth');
Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard')->middleware('auth'); // after complete payment redirect to the home page
Route::get('/user/orders', [PaymentController::class, 'orderHistory'])->name('user.orders')->middleware('auth');

Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update')->middleware('auth');

Route::get('/user/settings', [UserController::class, 'settings'])->name('user.settings')->middleware('auth');
Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update-password')->middleware('auth');
Route::post('/user/delete-account', [UserController::class, 'deleteAccount'])->name('user.delete-account')->middleware('auth');

Route::get('logout', [UserController::class, 'logout'])
    ->name('logout')->middleware('auth');

// Cart Routes
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');
Route::get('/user/cart', [CartController::class, 'viewCart'])->name('user.cart')->middleware('auth');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update')->middleware('auth');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');


// Payment Routes
Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent'])->name('payment.intent')->middleware('auth');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process')->middleware('auth');

// admin section

Route::get('/admin', [AdminController::class, 'showLogin'])->name("show.adminLogin");
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin-dashboard');

Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::post('/admin', [AdminController::class, 'adminLogin'])->name("admin.login");
Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin-product');
Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin-orders');
