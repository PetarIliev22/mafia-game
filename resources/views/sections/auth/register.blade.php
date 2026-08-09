<form
    method="POST"
    action="{{ route('register.store') }}"
    enctype="multipart/form-data"
    class="component-auth-form"
>
    @csrf

    <div class="text-center mb-4">
        <h1 class="h4 fw-bold mb-2">
            Създай профил
        </h1>

        <p class="text-secondary mb-4">
            Присъедини се към играта и стани част от мафията.
        </p>

        <div class="component-auth-avatar-wrapper position-relative d-inline-block">
            <div
                class="component-auth-avatar-placeholder component-auth-avatar rounded-circle d-flex align-items-center justify-content-center"
            >
                <i class="bi bi-person-fill" aria-hidden="true"></i>
            </div>

            <img
                src=""
                alt="Профилна снимка"
                class="component-auth-avatar-preview component-auth-avatar rounded-circle object-fit-cover d-none"
            >

            <label
                for="avatar"
                class="component-auth-avatar-button position-absolute d-flex align-items-center justify-content-center rounded-circle"
                aria-label="Качи профилна снимка"
            >
                <i class="bi bi-camera-fill" aria-hidden="true"></i>
            </label>

            <input
                id="avatar"
                type="file"
                name="avatar"
                class="component-auth-avatar-input d-none"
                accept="image/png,image/jpeg,image/webp"
            >
        </div>

        @error('avatar', 'register')
            <div class="invalid-feedback d-block mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-grid gap-3">
        <div>
            <div class="component-auth-field input-group">
                <span class="input-group-text">
                    <i class="bi bi-person" aria-hidden="true"></i>
                </span>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Име"
                    autocomplete="name"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->register->has('name'),
                    ])
                    required
                >
            </div>

            @error('name', 'register')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <div class="component-auth-field input-group">
                <span class="input-group-text">
                    <i class="bi bi-at" aria-hidden="true"></i>
                </span>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Потребителско име"
                    autocomplete="username"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->register->has('username'),
                    ])
                    required
                >
            </div>

            @error('username', 'register')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

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
                        'is-invalid' => $errors->register->has('email'),
                    ])
                    required
                >
            </div>

            @error('email', 'register')
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
                    autocomplete="new-password"
                    @class([
                        'form-control',
                        'is-invalid' => $errors->register->has('password'),
                    ])
                    required
                >
            </div>

            @error('password', 'register')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="component-auth-field input-group">
            <span class="input-group-text">
                <i class="bi bi-lock" aria-hidden="true"></i>
            </span>

            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Потвърди паролата"
                autocomplete="new-password"
                required
            >
        </div>

        <div>
            <label class="form-check">
                <input
                    type="checkbox"
                    name="terms"
                    value="1"
                    class="form-check-input"
                    @checked(old('terms'))
                    required
                >

                <span class="form-check-label">
                    Съгласявам се с Общите условия
                </span>
            </label>

            @error('terms', 'register')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <button
        type="submit"
        class="component-auth-submit btn w-100 mt-4"
    >
        Регистрирай се
    </button>
</form>
