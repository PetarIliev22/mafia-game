@extends('layouts.app')

@section('title', 'Mafia')
@section('body-class', 'page-home-body')

@section('content')
    @php
        $profile = session('profile');

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
        :avatar="$profile['avatar_url']"
        :name="$profile['name']"
        :rank="$profile['rank']['name']"
        :coins="$profile['coins']"
        :profile-url="route('home', ['tab' => 'profile'])"
        :show-back="$activeTab !== 'home'"
        :back-url="route('home')"
        notifications-url="#"
        :has-notifications="false"
    />

    <main class="page-home px-4 pt-3">
        @include($tabs[$activeTab])
    </main>
@endsection
