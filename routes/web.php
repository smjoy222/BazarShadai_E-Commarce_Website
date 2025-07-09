<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// vegetables page
Route::get('/vegetables',function(){
    return view('vegetables');
})->name('vegetables');

Route::get('/login',function(){
    return view('user.login');
})->name('login');

Route::get('/register',function(){
    return view('user.register');
})->name('register');

Route::get('/forget-password',function(){
    return view('user.forget-pass');
})->name('forget-pass');

Route::get('/reset-pass',function(){
    return view('user.reset-pass');
})->name('reset-pass');

