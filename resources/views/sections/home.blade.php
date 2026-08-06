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


        @php($user = auth()->user())
        <section class="section-player-level mt-3" style="--rank-color: {{ $user->rank['color'] }}">
            <div class="component-player-level d-flex align-items-center gap-3 p-3">
                <div class="component-player-level-badge flex-shrink-0">
                    <img
                        src="{{ asset($user->rank['shield']) }}"
                        alt=""
                        class="component-player-level-shield"
                    >

                    <span>{{ $user->level }}</span>
                </div>

                <div class="flex-grow-1 overflow-hidden">
                    <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                        <div>
                            <div class="h6 fw-bold mb-1">
                                Ниво {{ $user->level }}
                            </div>

                            <div class="small text-secondary">
                                {{ $user->rank['name'] }}
                            </div>

                            <div class="mt-2">
                                {{ $user->xp }} XP
                            </div>
                        </div>


                        <img
                            src="{{ asset($user->rank['icon']) }}"
                            alt="{{ $user->rank['name'] }}"
                            width="52"
                            height="52"
                            class="component-player-rank-icon object-fit-contain"
                        >
                    </div>

                    <div
                        class="progress component-player-level-progress"
                        role="progressbar"
                        aria-label="Прогрес до следващото ниво"
                        aria-valuenow="{{ $user->level_progress }}"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    >
                        <div
                            class="progress-bar"
                            style="width: {{ $user->level_progress }}%"
                        ></div>
                    </div>

                    <div class="d-flex justify-content-between gap-2 mt-2">
                        <small class="component-player-level-xp">
                            {{ $user->current_level_xp }} /
                            {{ $user->current_level_xp + $user->remaining_level_xp }} XP
                        </small>

                        <small class="component-player-level-remaining text-nowrap">
                            Още {{ $user->remaining_level_xp }} XP
                        </small>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
