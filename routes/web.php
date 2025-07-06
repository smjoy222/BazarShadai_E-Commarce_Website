<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Test email route
Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from BazarShadai!', function ($message) {
            $message->to('test@example.com')
                    ->subject('Test Email from BazarShadai');
        });
        return 'Email sent successfully! Check your Mailtrap inbox.';
    } catch (Exception $e) {
        return 'Error sending email: ' . $e->getMessage();
    }
})->name('test.email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
