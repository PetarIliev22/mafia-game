<section class="section-home">
    <div class="section-home-hero text-center">
        <img
            src="{{ asset('img/game_logo.png') }}"
            alt="Mafia"
            width="190"
            height="190"
            class="component-home-logo img-fluid object-fit-contain"
        >

        <p class="text-secondary text-uppercase small fw-semibold letter-spacing mb-0">
            Доверието е лукс
        </p>
    </div>

    <div class="section-home-actions d-grid gap-2 mt-3">
        <a
            href="#"
            class="component-new-game-button btn d-flex align-items-center justify-content-center gap-2 fw-semibold"
        >
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            <span>Създай нова игра</span>
        </a>

        <a
            href="#"
            class="component-join-game-button btn d-flex align-items-center justify-content-center gap-2 fw-semibold"
        >
            <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>
            <span>Влез в игра</span>
        </a>
    </div>

    <div class="section-home-games mt-4">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="h5 fw-bold mb-0">
                Моите игри
            </h2>

            <a
                href="{{ route('home', ['tab' => 'games']) }}"
                class="component-view-all-games-button d-flex align-items-center gap-1 small fw-semibold text-decoration-none"
            >
                <span>Виж всички</span>
                <i class="bi bi-chevron-right" aria-hidden="true"></i>
            </a>
        </div>

        <a
            href="#"
            class="component-game-card d-flex align-items-center gap-3 p-3 text-decoration-none"
        >
            <div class="component-game-card-icon flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-people" aria-hidden="true"></i>
            </div>

            <div class="flex-grow-1">
                <h3 class="component-game-card-title h6 fw-semibold mb-1">
                    Игра в ход
                </h3>

                <p class="component-game-card-players small mb-0">
                    9/12 играчи
                </p>
            </div>

            <i
                class="bi bi-chevron-right component-game-card-arrow flex-shrink-0"
                aria-hidden="true"
            ></i>
        </a>
    </div>
</section>
