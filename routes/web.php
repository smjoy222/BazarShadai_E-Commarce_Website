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

Route::get('/user/home', [HomeController::class, 'userDashboard'])->name('user.home')->middleware('auth');

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
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update')->middleware('auth');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('admin-dashboard');

Route::get('/admin/product', function () {
    return view('admin.product.product');
})->name('admin-product');

// Admin Product Management Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/products', [AdminController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{product}/toggle-featured', [AdminController::class, 'toggleFeatured'])->name('products.toggle-featured');
});
