@php
    $user = auth()->user();
@endphp

<section class="section-profile pb-4">
    {{-- Profile information --}}
    <div class="component-profile-hero text-center mb-4">
        <div class="component-profile-avatar-wrapper position-relative d-inline-block">
            <div class="component-profile-page-avatar rounded-circle overflow-hidden">
                @if ($user->avatar_url)
                    <img
                        src="{{ $user->avatar_url }}"
                        alt="{{ $user->name }}"
                        class="w-100 h-100 object-fit-cover"
                    >
                @else
                    <span class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill" aria-hidden="true"></i>
                    </span>
                @endif
            </div>
        </div>

        <h1 class="h3 fw-bold mt-3 mb-1">
            {{ $user->name }}
        </h1>

        <p class="text-secondary mb-2">
            {{ '@' . $user->username }}
        </p>

        <div class="component-profile-rank d-inline-flex align-items-center gap-2">
            <img
                src="{{ asset($user->rank['icon']) }}"
                alt="{{ $user->rank['name'] }}"
                width="35"
                height="35"
                class="component-player-rank-icon object-fit-contain"
            >

            <span>{{ $user->rank['name'] }}</span>
        </div>

    </div>

    {{-- Account menu --}}
    <div class="component-profile-menu overflow-hidden mb-3">
        <a href="#" class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none">
            <i class="bi bi-person"></i>
            <span class="flex-grow-1">Лични данни</span>
            <i class="bi bi-chevron-right"></i>
        </a>

        <a href="#" class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none">
            <i class="bi bi-bell"></i>
            <span class="flex-grow-1">Известия</span>
            <i class="bi bi-chevron-right"></i>
        </a>

        <a href="#" class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none">
            <i class="bi bi-shield-check"></i>
            <span class="flex-grow-1">Поверителност</span>
            <i class="bi bi-chevron-right"></i>
        </a>

        <a href="#" class="component-profile-menu-item d-flex align-items-center gap-3 text-decoration-none">
            <i class="bi bi-question-circle"></i>
            <span class="flex-grow-1">Помощ</span>
            <i class="bi bi-chevron-right"></i>
        </a>
    </div>

    <button
        type="button"
        class="component-profile-logout btn w-100 d-flex align-items-center justify-content-center gap-2"
    >
        <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
        <span>Изход</span>
    </button>
</section>
