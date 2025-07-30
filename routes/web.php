<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Dynamic products page for all categories
Route::get('/products/{category}', function ($category) {
    $validCategories = ['vegetable', 'fruits', 'meats', 'fish', 'seafood', 'dairy'];

    if (!in_array($category, $validCategories)) {
        abort(404);
    }

    return view('product.product', compact('category'));
})->name('products');

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

Route::get('/user/home', [HomeController::class, 'userDashboard'])->name('user.home');

Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/user/settings', [UserController::class, 'settings'])->name('user.settings');
Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');
Route::post('/user/delete-account', [UserController::class, 'deleteAccount'])->name('user.delete-account');

Route::get('logout', [UserController::class, 'logout'])
    ->name('logout');

// Cart Routes
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update')->middleware('auth');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');


// admin section

Route::get('/admin', [AdminController::class, 'showLogin'])->name("show.adminLogin");
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin-dashboard');

Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::post('/admin', [AdminController::class, 'adminLogin'])->name("admin.login");
Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin-product');
