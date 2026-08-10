<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Support\UserProfileSession;
use Illuminate\Http\Request;

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
    Route::get('/home', function (Request $request) {
        $user = $request->user();

        $profile = UserProfileSession::get($request, $user);

        return view('pages.home', [
            'profile' => $profile,
        ]);
    })->name('home');
});

Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'home' : 'login'
    );
});
