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

        @php
            $user = auth()->user();

            $totalXp = (int) ($user->xp ?? 0);
            $xpPerLevel = 1000;

            $level = intdiv($totalXp, $xpPerLevel);
            $currentXp = $totalXp % $xpPerLevel;
            $remainingXp = $xpPerLevel - $currentXp;
            $progress = ($currentXp / $xpPerLevel) * 100;

            $rank = match (true) {
                $level >= 50 => 'Дон',
                $level >= 30 => 'Подземен бос',
                $level >= 20 => 'Капо',
                $level >= 10 => 'Гангстер',
                $level >= 5  => 'Съучастник',
                default      => 'Новобранец',
            };
        @endphp

        <section class="section-player-level mt-3">
            <div class="component-player-level d-flex align-items-center gap-3 p-3">
                <div class="component-player-level-badge flex-shrink-0 d-flex align-items-center justify-content-center">
                    <span>{{ $level }}</span>
                </div>

                <div class="flex-grow-1 overflow-hidden">
                    <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                        <div>
                            <div class="h6 fw-bold mb-1">
                                Ниво {{ $level }}
                            </div>

                            <div class="small text-secondary">
                                {{ $rank }}
                            </div>
                        </div>

                        <i
                            class="bi bi-shield-shaded component-player-rank-icon"
                            aria-hidden="true"
                        ></i>
                    </div>

                    <div
                        class="progress component-player-level-progress"
                        role="progressbar"
                        aria-label="Прогрес до следващото ниво"
                        aria-valuenow="{{ $currentXp }}"
                        aria-valuemin="0"
                        aria-valuemax="{{ $xpPerLevel }}"
                    >
                        <div
                            class="progress-bar"
                            style="width: {{ $progress }}%"
                        ></div>
                    </div>

                    <div class="d-flex justify-content-between gap-2 mt-2">
                        <small class="component-player-level-xp">
                            {{ $currentXp }} / {{ $xpPerLevel }} XP
                        </small>

                        <small class="component-player-level-remaining text-nowrap">
                            Още {{ $remainingXp }} XP
                        </small>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
