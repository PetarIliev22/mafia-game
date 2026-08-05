@extends('layouts.app')

@section('title', 'Вход и регистрация')

@section('content')
    @php
        $registerActive = $errors->register->any();
    @endphp

    <div class="page-auth px-4 py-5">
        <section class="section-auth w-100">
            <div class="tab-content">
                <div
                    id="auth-login"
                    @class([
                        'tab-pane',
                        'fade',
                        'show active' => !$registerActive,
                    ])
                    role="tabpanel"
                    aria-labelledby="auth-login-tab"
                    tabindex="0"
                >
                    @include('sections.auth.login')
                </div>

                <div
                    id="auth-register"
                    @class([
                        'tab-pane',
                        'fade',
                        'show active' => $registerActive,
                    ])
                    role="tabpanel"
                    aria-labelledby="auth-register-tab"
                    tabindex="0"
                >
                    @include('sections.auth.register')
                </div>
            </div>

            <nav
                class="component-auth-switch nav justify-content-center mt-4"
                role="tablist"
                aria-label="Вход и регистрация"
            >
                <button
                    id="auth-login-tab"
                    type="button"
                    @class([
                        'nav-link',
                        'p-0',
                        'active' => !$registerActive,
                    ])
                    data-bs-toggle="tab"
                    data-bs-target="#auth-login"
                    role="tab"
                    aria-controls="auth-login"
                    aria-selected="{{ $registerActive ? 'false' : 'true' }}"
                >
                    <span class="text-secondary fw-normal">
                        Вече имаш акаунт?
                    </span>

                    <span class="fw-semibold">
                        Вход
                    </span>
                </button>

                <button
                    id="auth-register-tab"
                    type="button"
                    @class([
                        'nav-link',
                        'p-0',
                        'active' => $registerActive,
                    ])
                    data-bs-toggle="tab"
                    data-bs-target="#auth-register"
                    role="tab"
                    aria-controls="auth-register"
                    aria-selected="{{ $registerActive ? 'true' : 'false' }}"
                >
                    <span class="text-secondary fw-normal">
                        Нямаш акаунт?
                    </span>

                    <span class="fw-semibold">
                        Регистрирай се
                    </span>
                </button>
            </nav>
        </section>
    </div>
@endsection
