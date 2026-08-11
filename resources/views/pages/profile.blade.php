@extends('layouts.app')

@section('title', 'Профил')
@section('body-class', 'page-home-body')

@section('content')
    <x-app-header
        :avatar="$profile['avatar_url']"
        :name="$profile['name']"
        :rank="$profile['rank']['name']"
        :coins="$profile['coins']"
        :show-back="true"
        :back-url="route('home')"
        profile-url="#"
        notifications-url="#"
        :has-notifications="false"
    />

    <main class="page-home px-4 pt-3">
        <section class="section-profile pb-4">
            <div class="component-profile-hero text-center mb-4">
                <div class="component-profile-avatar-wrapper position-relative d-inline-block">
                    <div class="component-profile-page-avatar position-relative">

                        <div class="component-profile-page-image w-100 h-100 rounded-circle overflow-hidden">
                            @if ($profile['avatar_url'])
                                <img
                                    src="{{ $profile['avatar_url'] }}"
                                    alt="{{ $profile['name'] }}"
                                    class="w-100 h-100 object-fit-cover"
                                >
                            @else
                                <span class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-fill" aria-hidden="true"></i>
                                </span>
                            @endif
                        </div>

                        @if ($profile['rank']['frame'] ?? null)
                            <img
                                src="{{ asset($profile['rank']['frame']) }}"
                                alt=""
                                class="component-profile-page-frame"
                                aria-hidden="true"
                            >
                        @endif

                    </div>
                </div>

                <h1 class="h3 fw-bold mt-3 mb-1">
                    {{ $profile['name'] }}
                </h1>

                <p class="text-secondary mb-2">
                    {{ '@' . $profile['username'] }}
                </p>

                <div class="component-profile-rank d-inline-flex align-items-center gap-2">
                    <img
                        src="{{ asset($profile['rank']['icon']) }}"
                        alt="{{ $profile['rank']['name'] }}"
                        width="35"
                        height="35"
                        class="component-player-rank-icon object-fit-contain"
                    >

                    <span>{{ $profile['rank']['name'] }}</span>
                </div>
            </div>

            {{-- Account menu --}}
            <div class="component-profile-menu overflow-hidden mb-3">
                <a
                    href="#"
                    class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none"
                >
                    <i class="bi bi-person"></i>
                    <span class="flex-grow-1">Лични данни</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a
                    href="#"
                    class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none"
                >
                    <i class="bi bi-bell"></i>
                    <span class="flex-grow-1">Известия</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a
                    href="#"
                    class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none"
                >
                    <i class="bi bi-shield-check"></i>
                    <span class="flex-grow-1">Поверителност</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a
                    href="#"
                    class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none"
                >
                    <i class="bi bi-question-circle"></i>
                    <span class="flex-grow-1">Помощ</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="component-profile-logout btn w-100 d-flex align-items-center justify-content-center gap-2"
                >
                    <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
                    <span>Изход</span>
                </button>
            </form>
        </section>
    </main>
@endsection