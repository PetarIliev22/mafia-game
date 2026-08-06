@props([
    'avatar' => null,
    'profileUrl' => '#',
    'notificationsUrl' => '#',
    'settingsUrl' => '#',
    'hasNotifications' => false,
])

<header class="section-app-header d-flex align-items-center justify-content-between mt-2 px-4">
    <a
        href="{{ $profileUrl }}"
        class="component-profile-avatar d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
        aria-label="Профил"
    >
        @if ($avatar)
            <img
                src="{{ asset('storage/' . $avatar) }}"
                alt="Профил"
                class="w-100 h-100 object-fit-cover"
            >
        @else
            <i class="bi bi-person" aria-hidden="true"></i>
        @endif
    </a>

    <div class="d-flex align-items-center gap-2">
        <a
            href="{{ $notificationsUrl }}"
            class="component-icon-button btn position-relative d-flex align-items-center justify-content-center"
            aria-label="Известия"
        >
            <i class="bi bi-bell" aria-hidden="true"></i>

            @if ($hasNotifications)
                <span
                    class="notification-indicator position-absolute bg-danger border border-light rounded-circle"
                    aria-hidden="true"
                ></span>
            @endif
        </a>

        <a
            href="{{ $settingsUrl }}"
            class="component-icon-button btn d-flex align-items-center justify-content-center"
            aria-label="Настройки"
        >
            <i class="bi bi-gear" aria-hidden="true"></i>
        </a>
    </div>
</header>
