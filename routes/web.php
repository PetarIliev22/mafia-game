<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LobbyController;
use App\Models\Game;

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
        $games = Game::whereHas('players', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->withCount('players')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.main', [
            'profile' => session('profile'),
            'games' => $games,
        ]);
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('/games', [GameController::class, 'store'])
        ->name('games.store');

    Route::post('/games/join', [GameController::class, 'join'])
        ->name('games.join');

    Route::controller(LobbyController::class)->group(function () {
        Route::get('/games/{game}/lobby', 'show')
            ->name('games.lobby');

        Route::get('/games/{game}/players', 'players')
            ->name('games.players');
    });

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
