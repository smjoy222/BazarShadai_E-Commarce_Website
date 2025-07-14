<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Dynamic products page for all categories
Route::get('/products/{category}', function($category) {
    $validCategories = ['vegetables', 'fruits', 'meats', 'fish', 'seafood', 'dairy'];
    
    if (!in_array($category, $validCategories)) {
        abort(404);
    }
    
    return view('products', compact('category'));
})->name('products');

Route::get('/login',function(){
    return view('user.login');
})->name('login');

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/forget-password', function () {
    return view('user.forget-pass');
})->name('forget-password');


Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('admin-dashboard');

Route::get('/admin/product', function () {
    return view('admin.product.product');
})->name('admin-product');
