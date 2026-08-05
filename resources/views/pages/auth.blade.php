@extends('layouts.app')

@section('title', $isRegister ? 'Регистрация' : 'Вход')

@section('content')
    <div class="page-auth px-4 py-5">
        <section class="section-auth">
            <form
                method="POST"
                action="{{ $isRegister ? route('register') : route('login') }}"
                enctype="multipart/form-data"
            >
                @csrf

                {{-- Header --}}
                <div class="text-center mb-4">
                    @if ($isRegister)
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
                                type="file"
                                name="avatar"
                                id="avatar"
                                class="component-auth-avatar-input d-none"
                                accept="image/png,image/jpeg,image/webp"
                            >
                        </div>

                        @error('avatar')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    @else
                        <img
                            src="{{ asset('img/auth.png') }}"
                            alt="Mafia"
                            class="component-auth-logo img-fluid mb-4"
                        >

                        <h1 class="h4 fw-bold mb-0">
                            Вход в профила
                        </h1>
                    @endif
                </div>

                {{-- Fields --}}
                <div class="d-grid gap-3">
                    @if ($isRegister)
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
                                        'is-invalid' => $errors->has('name'),
                                    ])
                                    required
                                >
                            </div>

                            @error('name')
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
                                        'is-invalid' => $errors->has('username'),
                                    ])
                                    required
                                >
                            </div>

                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif

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
                                    'is-invalid' => $errors->has('email'),
                                ])
                                required
                            >
                        </div>

                        @error('email')
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
                                autocomplete="{{ $isRegister ? 'new-password' : 'current-password' }}"
                                @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('password'),
                                ])
                                required
                            >
                        </div>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if ($isRegister)
                        <div>
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

                            @error('terms')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @else
                        <a href="#" class="text-end small">
                            Забравена парола?
                        </a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="component-auth-submit btn w-100 mt-4"
                >
                    {{ $isRegister ? 'Регистрирай се' : 'Вход' }}
                </button>
            </form>

            {{-- Social login --}}
            @unless ($isRegister)
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
            @endunless

            {{-- Switch mode --}}
            <p class="text-center text-secondary mt-4 mb-0">
                {{ $isRegister ? 'Вече имаш акаунт?' : 'Нямаш акаунт?' }}

                <a
                    href="{{ route('auth', [
                        'mode' => $isRegister ? 'login' : 'register',
                    ]) }}"
                    class="fw-semibold"
                >
                    {{ $isRegister ? 'Вход' : 'Регистрирай се' }}
                </a>
            </p>
        </section>
    </div>
@endsection
