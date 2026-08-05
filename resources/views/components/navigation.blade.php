@props([
    'active' => 'home',
])

@php
    $navigationItems = [
        [
            'tab' => 'home',
            'label' => 'Начало',
            'icon' => 'bi-house-door-fill',
        ],
        [
            'tab' => 'games',
            'label' => 'Игри',
            'icon' => 'bi-controller',
        ],
        [
            'tab' => 'chat',
            'label' => 'Чат',
            'icon' => 'bi-chat-dots',
        ],
        [
            'tab' => 'profile',
            'label' => 'Профил',
            'icon' => 'bi-person',
        ],
    ];
@endphp

<nav
    class="component-bottom-navigation"
    aria-label="Основна навигация"
>
    @foreach ($navigationItems as $item)
        @php
            $isActive = $active === $item['tab'];
        @endphp

        <a
            href="{{ route('home', ['tab' => $item['tab']]) }}"
            class="component-bottom-navigation-link {{ $isActive ? 'active' : '' }}"
            @if ($isActive) aria-current="page" @endif
        >
            <i
                class="bi {{ $item['icon'] }}"
                aria-hidden="true"
            ></i>

            <span>{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
