<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LobbyController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'show')
            ->name('login');

        Route::post('/login', 'login')
            ->middleware('throttle:5,1')
            ->name('login.store');

        Route::post('/register', 'register')
            ->middleware('throttle:3,1')
            ->name('register.store');
    });

Route::middleware('auth')->group(function () {

    // Home
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Games
    Route::controller(GameController::class)->group(function () {
        Route::post('/games', 'store')
            ->name('games.store');

        Route::delete('/games/{game}', 'destroy')
            ->name('games.destroy');
    });

    // Lobby
    Route::controller(LobbyController::class)->group(function () {
        Route::post('/games/join', 'join')
            ->name('games.join');

        Route::get('/games/{game}/lobby', 'show')
            ->name('games.lobby');

        Route::get('/games/{game}/players', 'players')
            ->name('games.players');

        Route::delete('/games/{game}/leave', 'leave')
            ->name('games.leave');
    });
});

Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'home' : 'login'
    );
});