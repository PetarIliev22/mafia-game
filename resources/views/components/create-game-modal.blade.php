@props([
    'id' => 'createGameModal',
    'action' => '#',
])

<div
    id="{{ $id }}"
    class="modal fade component-create-game-modal"
    tabindex="-1"
    aria-labelledby="{{ $id }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content">
            <button
                type="button"
                class="component-create-game-close btn-close position-absolute"
                data-bs-dismiss="modal"
                aria-label="Затвори"
            ></button>

            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <div class="component-create-game-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3">
                        <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    </div>

                    <h2
                        id="{{ $id }}Label"
                        class="h5 fw-bold mb-1"
                    >
                        Създай игра
                    </h2>

                    <p class="text-secondary small mb-0">
                        Настрой основните параметри на играта
                    </p>
                </div>

                <form method="POST" action="{{ $action }}">
                    @csrf

                    <div class="mb-3">
                        <label
                            for="gameName"
                            class="form-label small text-secondary"
                        >
                            Име на играта
                        </label>

                        <input
                            id="gameName"
                            type="text"
                            name="name"
                            class="form-control component-create-game-input"
                            maxlength="100"
                            placeholder="Mafia Night"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label
                            for="maxPlayers"
                            class="form-label small text-secondary"
                        >
                            Брой играчи
                        </label>

                        <select
                            id="maxPlayers"
                            name="max_players"
                            class="form-select component-create-game-input"
                            required
                        >
                            <option value="6">6 играчи</option>
                            <option value="7">7 играчи</option>
                            <option value="8">8 играчи</option>
                            <option value="9">9 играчи</option>
                            <option value="10" selected>10 играчи</option>
                            <option value="11">11 играчи</option>
                            <option value="12">12 играчи</option>
                            <option value="13">13 играчи</option>
                            <option value="14">14 играчи</option>
                            <option value="15">15 играчи</option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="component-create-game-submit btn w-100 mt-2 fw-semibold"
                    >
                        Създай игра
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>