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
        <section class="section-lobby" data-game-id="{{ $game->id }}" data-players-url="{{ route('games.players', $game) }}">
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

                <span class="component-lobby-player-count text-secondary small">
                    {{ $game->players->count() }} / {{ $game->max_players }}
                </span>
            </div>

            @include('partials.lobby-players')

            <div class="section-lobby-actions d-grid gap-2 mt-4">
                <a
                    href="{{ route('home') }}"
                    class="component-lobby-exit btn w-100 d-flex align-items-center justify-content-center gap-2"
                >
                    <i class="bi bi-box-arrow-left" aria-hidden="true"></i>
                    <span>Излез</span>
                </a>

                @if ($game->host_id === auth()->id())
                    <form
                        method="POST"
                        action="{{ route('games.destroy', $game) }}"
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
                @else
                    <form
                        method="POST"
                        action="{{ route('games.leave', $game) }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="component-lobby-leave btn w-100 d-flex align-items-center justify-content-center gap-2"
                        >
                            <i class="bi bi-door-open" aria-hidden="true"></i>
                            <span>Напусни играта</span>
                        </button>
                    </form>
                @endif
            </div>
            </div>
        </section>
    </main>
@endsection