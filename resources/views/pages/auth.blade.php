@extends('layouts.app')

@section('title', request('mode') === 'register' ? 'Регистрация' : 'Вход')

@section('content')
@php
    $isRegister = request('mode') === 'register';
@endphp

<div class="page-auth px-3 py-4">
    <section class="section-auth">

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
                        <i class="bi bi-person-fill"></i>
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
                        <i class="bi bi-camera-fill"></i>
                    </label>

                    <input
                        type="file"
                        name="avatar"
                        id="avatar"
                        class="component-auth-avatar-input d-none"
                        accept="image/png,image/jpeg,image/webp"
                    >
                </div>
            @else
                <img
                    src="{{ asset('img/auth.png') }}"
                    alt="Mafia"
                    class="component-auth-logo img-fluid mb-4"
                >

                <div class="text-start">
                    <h1 class="h4 fw-bold mb-2 text-center">
                        Вход в профила
                    </h1>
                </div>
            @endif
        </div>

        {{-- Form --}}
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <div class="d-grid gap-3">
                @if ($isRegister)
                    <div class="component-auth-field input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Име"
                            required
                        >
                    </div>

                    <div class="component-auth-field input-group">
                        <span class="input-group-text">
                            <i class="bi bi-at"></i>
                        </span>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Потребителско име"
                            required
                        >
                    </div>
                @endif

                <div class="component-auth-field input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Имейл"
                        required
                    >
                </div>

                <div class="component-auth-field input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Парола"
                        required
                    >
                </div>

                @if ($isRegister)
                    <div class="component-auth-field input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Потвърди паролата"
                            required
                        >
                    </div>

                    <label class="form-check">
                        <input
                            type="checkbox"
                            name="terms"
                            class="form-check-input"
                            required
                        >

                        <span class="form-check-label">
                            Съгласявам се с Общите условия
                        </span>
                    </label>
                @else
                    <a href="#" class="text-end small">
                        Забравена парола?
                    </a>
                @endif
            </div>

            <button
                type="submit"
                class="component-auth-submit btn btn-dark w-100 mt-4"
            >
                {{ $isRegister ? 'Регистрирай се' : 'Вход' }}
            </button>
        </form>

        {{-- Social login --}}
        @unless ($isRegister)
            <div class="component-auth-divider d-flex align-items-center gap-3 my-4">
                <span class="flex-grow-1"></span>
                <small class="text-secondary">или</small>
                <span class="flex-grow-1"></span>
            </div>

            <div class="d-grid gap-3">
                <a
                    href="#"
                    class="component-social-button btn d-flex align-items-center justify-content-center position-relative"
                >
                    <img
                        src="{{ asset('img/google-icon.svg') }}"
                        alt=""
                        class="component-social-icon"
                    >

                    <span>Sign in with Google</span>
                </a>

                <a
                    href="#"
                    class="component-social-button btn d-flex align-items-center justify-content-center position-relative"
                >
                    <i class="bi bi-apple component-social-icon"></i>

                    <span>Sign in with Apple</span>
                </a>
            </div>
        @endunless

        {{-- Switch mode --}}
        <p class="text-center text-secondary mt-4 mb-0">
            {{ $isRegister ? 'Вече имаш акаунт?' : 'Нямаш акаунт?' }}

            <a
                href="{{ route('auth', [
                    'mode' => $isRegister ? 'login' : 'register'
                ]) }}"
                class="fw-semibold"
            >
                {{ $isRegister ? 'Вход' : 'Регистрирай се' }}
            </a>
        </p>

    </section>
</div>
@endsection
