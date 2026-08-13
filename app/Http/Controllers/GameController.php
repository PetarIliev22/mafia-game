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

    public function join(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'size:6'],
        ]);

        $game = Game::where('code', strtoupper($data['code']))
            ->where('status', 'waiting')
            ->first();

        if (! $game) {
            return back()->withErrors([
                'code' => 'Няма активна игра с този код.',
            ]);
        }

        if ($game->players()->count() >= $game->max_players) {
            return back()->withErrors([
                'code' => 'Играта вече е пълна.',
            ]);
        }

        $game->players()->firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('games.lobby', $game);
    }

    public function destroy(Game $game): RedirectResponse
    {
        if ($game->host_id !== auth()->id()) {
            abort(403);
        }

        $game->delete();

        return redirect()->route('home');
    }
}