<div class="text-center mb-4">
    <img
        src="{{ asset('img/auth.png') }}"
        alt="Mafia"
        class="component-auth-logo img-fluid mb-4"
    >

    <h1 class="h4 fw-bold mb-0">
        Вход в профила
    </h1>
</div>

<form
    method="POST"
    action="{{ route('login.store') }}"
    class="component-register-form"
>
    @csrf

    <div class="d-grid gap-3">
        <div>
            <div class="component-auth-field input-group">
                <span class="input-group-text">
                    <i class="bi bi-envelope" aria-hidden="true"></i>
                </span>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Имейл"
                    autocomplete="email"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->login->has('email'),
                    ])
                    required
                >
            </div>

            @error('email', 'login')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <div class="component-auth-field input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock" aria-hidden="true"></i>
                </span>

                <input
                    type="password"
                    name="password"
                    placeholder="Парола"
                    autocomplete="current-password"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->login->has('password'),
                    ])
                    required
                >
            </div>

            @error('password', 'login')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="#" class="text-end small">
            Забравена парола?
        </a>
    </div>

    <button
        type="submit"
        class="component-auth-submit btn w-100 mt-4"
    >
        Вход
    </button>
</form>

<div class="component-auth-divider d-flex align-items-center gap-3 my-4">
    <span class="flex-grow-1"></span>
    <small>или</small>
    <span class="flex-grow-1"></span>
</div>

<div class="d-grid gap-3">
    <a href="#" class="component-social-button btn">
        <img
            src="{{ asset('img/google-icon.svg') }}"
            alt=""
            class="component-social-icon"
        >

        <span>Sign in with Google</span>
        <span aria-hidden="true"></span>
    </a>

    <a href="#" class="component-social-button btn">
        <i
            class="bi bi-apple component-social-icon"
            aria-hidden="true"
        ></i>

        <span>Sign in with Apple</span>
        <span aria-hidden="true"></span>
    </a>
</div>
