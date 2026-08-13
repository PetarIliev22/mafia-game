@props([
    'id' => 'joinGameModal',
    'action' => '#',
])

<div
    id="{{ $id }}"
    class="modal fade component-join-game-modal"
    tabindex="-1"
    aria-labelledby="{{ $id }}Label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered px-3">
        <div class="modal-content">
            <button
                type="button"
                class="component-join-game-close btn-close position-absolute"
                data-bs-dismiss="modal"
                aria-label="Затвори"
            ></button>

            <div class="modal-body text-center p-4">
                <div class="component-join-game-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3">
                    <i class="bi bi-key" aria-hidden="true"></i>
                </div>

                <h2
                    id="{{ $id }}Label"
                    class="h5 fw-bold mb-1"
                >
                    Влез в игра
                </h2>

                <p class="component-join-game-description small mb-4">
                    Въведи кода, получен от домакина
                </p>

                <form method="POST" action="{{ route('games.join') }}">
                    @csrf

                    <input
                        type="text"
                        name="code"
                        class="component-join-game-code form-control text-center text-uppercase"
                        maxlength="6"
                        autocomplete="off"
                        placeholder="ABC123"
                        required
                    >

                    <button
                        type="submit"
                        class="component-join-game-submit btn w-100 mt-3 fw-semibold"
                    >
                        Присъедини се
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>