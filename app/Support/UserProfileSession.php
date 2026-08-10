<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileSession
{
    public static function sync(Request $request, User $user): void
    {
        $request->session()->put('profile', [
            'id' => $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'avatar_url' => $user->avatar_url,
            'rank' => $user->rank,
            'coins' => $user->coins ?? 0,
            'xp' => $user->xp ?? 0,
        ]);
    }

    public static function get(Request $request, User $user): array
    {
        $profile = $request->session()->get('profile');

        if ($profile) {
            return $profile;
        }

        self::sync($request, $user);

        return $request->session()->get('profile');
    }
}