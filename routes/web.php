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
