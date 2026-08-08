@extends('layouts.app')

@section('title', 'Mafia')
@section('body-class', 'page-home-body')

@section('content')
    @php
        $tabs = [
            'home' => 'sections.home',
            'games' => 'sections.games',
            'chat' => 'sections.chat',
            'profile' => 'sections.profile',
        ];

        $activeTab = request()->query('tab', 'home');

        if (!array_key_exists($activeTab, $tabs)) {
            $activeTab = 'home';
        }
    @endphp

    <x-app-header
        :avatar-url="auth()->user()->avatar_url"
        :profile-url="route('home', ['tab' => 'profile'])"
    />

    <main class="page-home px-4 pt-2">
        <div class="tab-content">
            <div
                id="tab-home"
                class="tab-pane fade show active"
                role="tabpanel"
                aria-labelledby="navigation-home"
            >
                @include('sections.home')
            </div>

            <div
                id="tab-games"
                class="tab-pane fade"
                role="tabpanel"
                aria-labelledby="navigation-games"
            >
                @include('sections.games')
            </div>

            <div
                id="tab-chat"
                class="tab-pane fade"
                role="tabpanel"
                aria-labelledby="navigation-chat"
            >
                @include('sections.chat')
            </div>

            <div
                id="tab-profile"
                class="tab-pane fade"
                role="tabpanel"
                aria-labelledby="navigation-profile"
            >
                @include('sections.profile')
            </div>
        </div>
    </main>

    <x-navigation :active="$activeTab" />
@endsection
