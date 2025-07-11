<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/forget-password', function () {
    return view('user.forget-pass');
})->name('forget-password');


Route::get('/product/{category}', function ($category) {
    return view('product.product', ['category' => $category]);
})->name('product');


Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('admin-dashboard');

Route::get('/admin/product', function () {
    return view('admin.product.product');
})->name('admin-product');
