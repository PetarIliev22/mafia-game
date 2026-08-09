<header class="section-app-header d-flex align-items-center justify-content-between gap-3 mt-2 px-4">
    <div class="d-flex align-items-center">
        @if ($showBack)
            <a
                href="{{ $backUrl }}"
                class="component-header-back btn d-flex align-items-center justify-content-center"
                aria-label="Назад"
            >
                <i class="bi bi-chevron-left" aria-hidden="true"></i>
            </a>
        @else
            <a
                href="{{ $profileUrl }}"
                class="component-header-player d-flex align-items-center gap-2 text-decoration-none"
                aria-label="Профил"
            >
                <span class="component-profile-avatar flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle overflow-hidden">
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

                <span class="overflow-hidden">
                    <strong class="component-player-name d-block text-white text-truncate">
                        {{ $name }}
                    </strong>

                    <small class="component-player-rank d-block text-secondary text-truncate">
                        {{ $rank }}
                    </small>
                </span>
            </a>
        @endif
    </div>

    {{-- Currency and notifications --}}
    <div class="d-flex align-items-center gap-2">
        <div
            class="component-player-coins d-flex align-items-center gap-2 rounded-pill"
            aria-label="{{ $coins }} монети"
        >
            <span class="component-player-coin d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-coin" aria-hidden="true"></i>
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
