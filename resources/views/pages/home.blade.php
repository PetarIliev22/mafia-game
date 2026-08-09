@extends('layouts.app')

@section('title', 'Mafia')
@section('body-class', 'page-home-body')

@section('content')
    @php
        $user = auth()->user();

        $tabs = [
            'home' => 'sections.home',
            'games' => 'sections.games',
            'chat' => 'sections.chat',
            'profile' => 'sections.profile',
        ];

        $activeTab = request()->query('tab', 'home');

        if (! array_key_exists($activeTab, $tabs)) {
            $activeTab = 'home';
        }
    @endphp

    <x-app-header
        :avatar="$user->avatar_url"
        :name="$user->name"
        :rank="$user->rank['name']"
        :coins="$user->coins ?? 0"
        :profile-url="route('profile')"
        :show-back="$activeTab !== 'home'"
        :back-url="route('home')"
        notifications-url="#"
        :has-notifications="false"
    />

    <main class="page-home px-4 pt-3">
        @include($tabs[$activeTab])
    </main>
@endsection
