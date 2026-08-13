<section class="section-home">
    <div class="section-home-hero text-center">
        <img
            src="{{ asset('img/game_logo.webp') }}"
            alt="Mafia"
            width="200"
            height="200"
            class="component-home-logo img-fluid object-fit-contain"
        >

        <p class="text-secondary text-uppercase small fw-semibold letter-spacing mb-0">
            Доверието е лукс
        </p>
    </div>

    <section class="section-home-actions d-grid gap-2 mt-2">
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

        <section class="section-player-level mt-3" style="--rank-color: {{ $profile['rank']['color'] }}">
            <div class="component-player-level d-flex align-items-center gap-3 p-3">
                <div class="component-player-level-badge flex-shrink-0">
                    <img
                        src="{{ asset($profile['rank']['shield']) }}"
                        alt=""
                        class="component-player-level-shield"
                    >

                    <span>{{ $profile['level'] }}</span>
                </div>

                <div class="flex-grow-1 overflow-hidden">
                    <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                        <div>
                            <div class="h6 fw-bold mb-1">
                                Ниво {{ $profile['level'] }}
                            </div>

                            <div class="small text-secondary">
                                {{ $profile['rank']['name'] }}
                            </div>

                            <div class="mt-2">
                                {{ $profile['xp'] }} XP
                            </div>
                        </div>


                        <img
                            src="{{ asset($profile['rank']['icon']) }}"
                            alt="{{ $profile['rank']['name'] }}"
                            width="52"
                            height="52"
                            class="component-player-rank-icon object-fit-contain"
                        >
                    </div>

                    <div
                        class="progress component-player-level-progress"
                        role="progressbar"
                        aria-label="Прогрес до следващото ниво"
                        aria-valuenow="{{ $profile['level_progress'] }}"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    >
                        <div
                            class="progress-bar"
                            style="width: {{ $profile['level_progress'] }}%"
                        ></div>
                    </div>

                    <div class="d-flex justify-content-between gap-2 mt-2">
                        <small class="component-player-level-xp">
                            {{ $profile['current_level_xp'] }} /
                            {{ $profile['remaining_level_xp'] + $profile['current_level_xp'] }} XP
                        </small>

                        <small class="component-player-level-remaining text-nowrap">
                            Още {{ $profile['remaining_level_xp'] }} XP
                        </small>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-my-games mt-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h5 fw-bold mb-0">
                    Моите игри
                </h2>

                <a
                    href="#"
                    class="small text-secondary text-decoration-none"
                >
                    Виж всички
                </a>
            </div>

            <div class="d-grid gap-3">
                <article class="component-game-card p-3">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="overflow-hidden">
                            <div class="fw-semibold text-white text-truncate">
                                Classic Mafia
                            </div>

                            <div class="small text-secondary mt-1">
                                10 играчи
                            </div>
                        </div>

                        <span class="badge rounded-pill text-bg-secondary">
                            Завършена
                        </span>
                    </div>
                </article>
            </div>
        </section>
    </section>
</section>
