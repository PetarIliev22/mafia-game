<div class="component-lobby-players d-grid gap-2">
    @foreach ($game->players as $player)
        <div class="component-lobby-player d-flex align-items-center gap-3 p-3">
            <div
                class="component-lobby-player-avatar position-relative rounded-circle flex-shrink-0"
                style="--rank-color: {{ $player->user->rank['color'] }}"
            >
                <div class="w-100 h-100 rounded-circle overflow-hidden">
                    @if ($player->user->avatar_url)
                        <img
                            src="{{ $player->user->avatar_url }}"
                            alt="{{ $player->user->name }}"
                            class="w-100 h-100 object-fit-cover"
                        >
                    @else
                        <span class="w-100 h-100 d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-fill"></i>
                        </span>
                    @endif
                </div>
            
                <span class="component-lobby-player-level">
                    <img
                        src="{{ asset($player->user->rank['shield']) }}"
                        alt=""
                        class="component-lobby-player-level-shield"
                    >
            
                    <span>
                        {{ $player->user->level }}
                    </span>
                </span>
            </div>

            <div class="flex-grow-1 overflow-hidden">
                <div class="fw-semibold text-truncate">
                    {{ $player->user->name }}
                </div>

                <div class="small text-secondary">
                    {{ '@' . $player->user->username }}
                </div>
            </div>

            @if ($player->user_id === $game->host_id)
                <span class="badge rounded-pill">
                    Host
                </span>
            @endif
        </div>
    @endforeach
</div>