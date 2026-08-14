<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function store(StoreGameRequest $request): RedirectResponse
    {
        $data = $request->validated();

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

    public function destroy(Game $game): RedirectResponse
    {
        $this->authorize('delete', $game);

        $game->delete();

        return redirect()->route('home');
    }
}