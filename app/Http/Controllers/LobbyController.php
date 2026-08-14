<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LobbyController extends Controller
{
    public function show(Game $game): View
    {
        $game->load('players.user');

        return view('pages.lobby', [
            'game' => $game,
            'profile' => session('profile'),
        ]);
    }

    public function players(Game $game): JsonResponse
    {
        $game->load('players.user');

        return response()->json([
            'html' => view('partials.lobby-players', [
                'game' => $game,
            ])->render(),

            'players_count' => $game->players->count(),
            'max_players' => $game->max_players,
        ]);
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

    public function leave(Game $game): RedirectResponse
    {
        if ($game->host_id === auth()->id()) {
            return back()->withErrors([
                'game' => 'Домакинът не може да напусне играта. Можеш да я прекратиш.',
            ]);
        }

        $game->players()
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->route('home');
    }
}