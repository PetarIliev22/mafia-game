<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/auth', 'show')->name('auth');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');
});

Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'home' : 'auth'
    );
});
