@props([
    'active' => 'home',
])

<nav
    class="component-bottom-navigation position-fixed start-50 translate-middle-x bottom-0 d-flex justify-content-around mb-3"
    role="tablist"
    aria-label="Основна навигация"
>
    <button
        type="button"
        id="navigation-home"
        class="component-bottom-navigation-link nav-link active text-center"
        data-bs-toggle="tab"
        data-bs-target="#tab-home"
        role="tab"
        aria-controls="tab-home"
        aria-selected="true"
    >
        <i class="bi bi-house-door-fill d-block fs-5" aria-hidden="true"></i>
        <span class="small">Начало</span>
    </button>

    <button
        type="button"
        id="navigation-games"
        class="component-bottom-navigation-link nav-link text-center"
        data-bs-toggle="tab"
        data-bs-target="#tab-games"
        role="tab"
        aria-controls="tab-games"
        aria-selected="false"
    >
        <i class="bi bi-controller d-block fs-5" aria-hidden="true"></i>
        <span class="small">Игри</span>
    </button>

    <button
        type="button"
        id="navigation-chat"
        class="component-bottom-navigation-link nav-link text-center"
        data-bs-toggle="tab"
        data-bs-target="#tab-chat"
        role="tab"
        aria-controls="tab-chat"
        aria-selected="false"
    >
        <i class="bi bi-chat-dots d-block fs-5" aria-hidden="true"></i>
        <span class="small">Чат</span>
    </button>

    <button
        type="button"
        id="navigation-profile"
        class="component-bottom-navigation-link nav-link text-center"
        data-bs-toggle="tab"
        data-bs-target="#tab-profile"
        role="tab"
        aria-controls="tab-profile"
        aria-selected="false"
    >
        <i class="bi bi-person d-block fs-5" aria-hidden="true"></i>
        <span class="small">Профил</span>
    </button>
</nav>
