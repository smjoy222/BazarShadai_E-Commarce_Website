<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// vegetables page
Route::get('/vegetables',function(){
    return view('vegetables');
})->name('vegetables');

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

Route::get('/register',function(){
    return view('user.register');
})->name('register');

Route::get('/forget-password',function(){
    return view('user.forget-pass');
})->name('forget-pass');

Route::get('/reset-pass',function(){
    return view('user.reset-pass');
})->name('reset-pass');

