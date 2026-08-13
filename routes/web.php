<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

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
        return view('pages.main', [
            'profile' => session('profile'),
        ]);
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('/games', [GameController::class, 'store'])
        ->name('games.store');

    Route::post('/games/join', [GameController::class, 'join'])
        ->name('games.join');

    Route::get('/games/{game}/lobby', function (\App\Models\Game $game) {
        return view('pages.lobby', [
            'game' => $game->load('players.user'),
            'profile' => session('profile'),
        ]);
    })->name('games.lobby');

    Route::delete('/games/{game}', [GameController::class, 'destroy'])
    ->name('games.destroy');

    Route::delete('/games/{game}/leave', [GameController::class, 'leave'])
    ->name('games.leave');
});

Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'home' : 'login'
    );
});
