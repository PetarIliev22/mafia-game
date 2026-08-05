<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/auth', 'show')->name('auth');

        Route::post('/login', 'login')
            ->middleware('throttle:5,1')
            ->name('login');

        Route::post('/register', 'register')
            ->middleware('throttle:3,1')
            ->name('register');
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
