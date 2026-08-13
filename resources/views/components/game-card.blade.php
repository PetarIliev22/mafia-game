@props([
    'game',
])

<a
    href="{{ route('games.lobby', $game) }}"
    class="component-game-card text-decoration-none"
>
    <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
        <div class="overflow-hidden">
            <div class="component-game-title text-white text-truncate">
                {{ $game->name }}
            </div>

            <div class="component-game-code mt-1">
                CODE {{ $game->code }}
            </div>
        </div>

        <span class="component-game-status {{ $game->status_class }}">
            <span></span>
            {{ $game->status_label }}
        </span>
    </div>

    <div class="component-game-divider"></div>

    <div class="d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="component-game-avatars d-flex align-items-center">
                @foreach ($game->players->take(4) as $player)
                    <span class="component-game-avatar">
                        @if ($player->user->avatar_url)
                            <img
                                src="{{ $player->user->avatar_url }}"
                                alt="{{ $player->user->name }}"
                            >
                        @else
                            <i class="bi bi-person-fill"></i>
                        @endif
                    </span>
                @endforeach

                @if ($game->players_count > 4)
                    <span class="component-game-avatar component-game-avatar-more">
                        +{{ $game->players_count - 4 }}
                    </span>
                @endif
            </div>

            <div>
                <div class="component-game-player-count">
                    {{ $game->players_count }} / {{ $game->max_players }}
                </div>

                <div class="component-game-player-label">
                    играчи
                </div>
            </div>
        </div>

        <span class="component-game-open">
            <i class="bi bi-arrow-up-right"></i>
        </span>
    </div>
</a>