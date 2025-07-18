<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('admin-dashboard');

Route::get('/admin/product', function () {
    return view('admin.product.product');
})->name('admin-product');
