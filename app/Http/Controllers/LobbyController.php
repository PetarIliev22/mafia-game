<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\JsonResponse;
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
}