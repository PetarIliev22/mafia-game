@extends('layouts.app')

@section('title', 'Лоби')
@section('body-class', 'page-home-body')

@section('content')
    <x-app-header
        :avatar="$profile['avatar_url']"
        :name="$profile['name']"
        :rank="$profile['rank']['name']"
        :frame="$profile['rank']['frame'] ?? null"
        :rank-color="$profile['rank']['color']"
        :coins="$profile['coins']"
        profile-url="#"
        notifications-url="#"
        :has-notifications="false"
    />

    <main class="page-home px-4 pt-3">
        <section class="section-lobby">
            <div class="text-center mb-4">
                <p class="text-secondary small mb-1">
                    Код на играта
                </p>

                <div class="h2 fw-bold mb-2">
                    {{ $game->code }}
                </div>

                <div class="text-secondary">
                    {{ $game->name }}
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h5 fw-bold mb-0">
                    Играчи
                </h2>

                <span class="text-secondary small">
                    {{ $game->players->count() }} / {{ $game->max_players }}
                </span>
            </div>

            <div class="d-grid gap-2">
                @foreach ($game->players as $player)
                    <div class="component-lobby-player d-flex align-items-center gap-3 p-3">
                        <div class="component-lobby-player-avatar rounded-circle overflow-hidden flex-shrink-0">
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
                @if ($game->host_id === auth()->id())
                <form
                    method="POST"
                    action="{{ route('games.destroy', $game) }}"
                    class="mt-4"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="component-lobby-stop btn w-100 d-flex align-items-center justify-content-center gap-2"
                    >
                        <i class="bi bi-x-circle" aria-hidden="true"></i>
                        <span>Прекрати играта</span>
                    </button>
                </form>
            @endif
            </div>
        </section>
    </main>
@endsection