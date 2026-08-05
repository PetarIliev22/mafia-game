<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, viewport-fit=cover"
        >

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#0b0b0d">
        <meta name="color-scheme" content="dark">

        {{-- iOS --}}
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta
            name="apple-mobile-web-app-status-bar-style"
            content="black-translucent"
        >
        <meta
            name="apple-mobile-web-app-title"
            content="Mafia"
        >

        <title>@yield('title', 'Mafia')</title>

        @vite([
            'resources/scss/app.scss',
            'resources/js/app.js',
        ])

        @stack('styles')
    </head>

    <body class="@yield('body-class')">
        <div class="app">
            @yield('content')
        </div>

        @stack('scripts')
    </body>
</html>
