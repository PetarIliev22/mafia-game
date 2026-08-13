@props([
    'avatar' => null,
    'name' => '',
    'rank' => '',
    'coins' => 0,
    'profileUrl' => '#',
    'notificationsUrl' => '#',
    'hasNotifications' => false,
])

<header class="section-app-header d-flex align-items-center justify-content-between gap-3 mt-2 px-4">
    <div class="d-flex align-items-center">
        <a
            href="#home-page"
            data-page-target="#home-page"
            class="component-header-back btn d-none align-items-center justify-content-center"
            aria-label="Назад"
        >
            <i class="bi bi-chevron-left" aria-hidden="true"></i>
        </a>

        <a
            href="#profile-page"
            data-page-target="#profile-page"
            class="component-header-player d-flex align-items-center gap-2 text-decoration-none"
            aria-label="Профил"
        >
        
                <span class="component-profile-avatar position-relative flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle">

                    <span class="w-100 h-100 rounded-circle overflow-hidden d-flex align-items-center justify-content-center">
                        @if ($avatar)
                            <img
                                src="{{ $avatar }}"
                                alt="{{ $name }}"
                                class="w-100 h-100 object-fit-cover"
                            >
                        @else
                            <i class="bi bi-person-fill" aria-hidden="true"></i>
                        @endif
                    </span>
                </span>

                <span class="overflow-hidden">
                    <strong class="component-player-name d-block text-white text-truncate">
                        {{ $name }}
                    </strong>

                    <small class="component-player-rank d-block text-secondary text-truncate">
                        {{ $rank }}
                    </small>
                </span>
            </a>
    </div>

    {{-- Currency and notifications --}}
    <div class="d-flex align-items-center gap-2">
        <div
            class="component-player-coins d-flex align-items-center gap-2 rounded-pill"
            aria-label="{{ $coins }} монети"
        >
            <span class="component-player-coin d-flex align-items-center justify-content-center rounded-circle">
                <img src="{{ asset('img/icons/coin.webp') }}" alt="Монети" width="24">
            </span>

            <strong>
                {{ number_format((int) $coins, 0, ',', ' ') }}
            </strong>
        </div>

        <a
            href="{{ $notificationsUrl }}"
            class="component-icon-button btn position-relative d-flex align-items-center justify-content-center rounded-circle"
            aria-label="Известия"
        >
            <i class="bi bi-bell" aria-hidden="true"></i>

            @if ($hasNotifications)
                <span
                    class="notification-indicator position-absolute bg-danger border border-dark rounded-circle"
                    aria-hidden="true"
                ></span>
            @endif
        </a>
    </div>
</header>
