<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/speed-db', function () {
    $start = microtime(true);

    DB::select('select 1');

    return response()->json([
        'db' => round((microtime(true) - $start) * 1000, 2) . ' ms',
    ]);
});


Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'show')->name('login');

    Route::post('/login', 'login')
        ->middleware('throttle:5,1')
        ->name('login.store');

    Route::post('/register', 'register')
        ->middleware('throttle:3,1')
        ->name('register.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');
});


Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'home' : 'login'
    );
});