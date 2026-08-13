@extends('layouts.app')

@section('title', 'Mafia')
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
        <div id="home-page" class="page-view" data-aos="fade-in">
            @include('sections.home')
        </div>

        <div id="profile-page" class="page-view d-none" data-aos="fade-in">
            @include('sections.profile')
        </div>
    </main>
    <x-join-game-modal />
@endsection