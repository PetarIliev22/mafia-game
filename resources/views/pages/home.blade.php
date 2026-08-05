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

    <main class="page-home px-3 pt-3 pb-5">
        @include($tabs[$activeTab])
    </main>

    <x-navigation :active="$activeTab" />
@endsection
