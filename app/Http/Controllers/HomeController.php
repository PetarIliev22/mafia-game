<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $games = Game::whereHas('players', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with('players.user')
            ->withCount('players')
            ->latest()
            ->take(3)
            ->get();

        return view('pages.main', [
            'profile' => session('profile'),
            'games' => $games,
        ]);
    }
}