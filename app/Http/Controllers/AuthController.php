<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\UserProfileSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function show(Request $request): View
    {
        return view('pages.auth', [
            'isRegister' => $request->query('mode') === 'register',
        ]);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request
                ->file('avatar')
                ->store('users', 's3');
        }

        unset($data['terms']);

        $user = User::create($data);

        Auth::login($user);
        $request->session()->regenerate();

        UserProfileSession::sync($request, $user);

        return redirect()->route('home');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Имейлът или паролата са грешни.',
                ], 'login')
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        UserProfileSession::sync($request, Auth::user());

        return redirect()->intended(route('home'));
    }
}
