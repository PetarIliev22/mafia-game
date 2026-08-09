<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/speed-db-double', function () {
    $start1 = microtime(true);

    DB::select('select 1');

    $first = (microtime(true) - $start1) * 1000;

    $start2 = microtime(true);

    DB::select('select 1');

    $second = (microtime(true) - $start2) * 1000;

    return response()->json([
        'first' => round($first, 2) . ' ms',
        'second' => round($second, 2) . ' ms',
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