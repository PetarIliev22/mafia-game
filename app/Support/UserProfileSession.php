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

            'xp' => $user->xp ?? 0,
            'coins' => $user->coins ?? 0,

            'level' => $user->level,
            'level_progress' => $user->level_progress,
            'current_level_xp' => $user->current_level_xp,
            'remaining_level_xp' => $user->remaining_level_xp,

            'rank' => $user->rank,
        ]);
    }
}