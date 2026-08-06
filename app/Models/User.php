<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Support\PlayerProgress;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

     protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'xp',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getLevelAttribute(): int
    {
        return PlayerProgress::level((int) $this->xp);
    }

    public function getCurrentLevelXpAttribute(): int
    {
        return PlayerProgress::currentXp((int) $this->xp);
    }

    public function getRemainingLevelXpAttribute(): int
    {
        return PlayerProgress::remainingXp((int) $this->xp);
    }

    public function getLevelProgressAttribute(): float
    {
        return PlayerProgress::progress((int) $this->xp);
    }

    public function getRankAttribute(): array
    {
        return PlayerProgress::rank($this->level);
    }
}
