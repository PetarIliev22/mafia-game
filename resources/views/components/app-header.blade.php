@props([
    'avatar' => 'images/avatar-placeholder.png',
    'profileUrl' => '#',
    'notificationsUrl' => '#',
    'settingsUrl' => '#',
    'hasNotifications' => false,
])

<section class="section-app-header d-flex align-items-center justify-content-between mt-3 mb-4 px-4">
    <a
        href="{{ $profileUrl }}"
        class="component-profile-avatar d-flex align-items-center justify-content-center rounded-circle shadow-sm"
        aria-label="Профил"
    >
        <i class="bi bi-person" aria-hidden="true"></i>
    </a>

    <div class="d-flex">
        <a href="{{ $notificationsUrl }}" class="component-icon-button btn position-relative d-flex align-items-center justify-content-center" aria-label="Известия">
            <i class="bi bi-bell"></i>

            @if ($hasNotifications)
                <span
                    class="notification-indicator position-absolute translate-middle p-1 bg-danger border border-light rounded-circle"
                    aria-hidden="true"
                ></span>
            @endif
        </a>

        <a href="{{ $settingsUrl }}" class="component-icon-button btn d-flex align-items-center justify-content-center" aria-label="Настройки">
            <i class="bi bi-gear"></i>
        </a>
    </div>
</section>
