<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'max_players' => ['required', 'integer', 'min:6', 'max:15'],
        ]);

        $game = DB::transaction(function () use ($data) {
            $game = Game::create([
                'host_id' => auth()->id(),
                'code' => Game::generateCode(),
                'name' => $data['name'],
                'max_players' => $data['max_players'],
                'status' => 'waiting',
            ]);

            $game->players()->create([
                'user_id' => auth()->id(),
            ]);

            return $game;
        });

        return redirect()
            ->route('games.lobby', $game);
    }
}