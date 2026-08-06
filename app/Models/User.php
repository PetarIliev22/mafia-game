<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public const XP_PER_LEVEL = 1000;

    public function getLevelAttribute(): int
    {
        return intdiv((int) $this->xp, self::XP_PER_LEVEL);
    }

    public function getCurrentLevelXpAttribute(): int
    {
        return (int) $this->xp % self::XP_PER_LEVEL;
    }

    public function getRemainingLevelXpAttribute(): int
    {
        return self::XP_PER_LEVEL - $this->current_level_xp;
    }

    public function getLevelProgressAttribute(): float
    {
        return ($this->current_level_xp / self::XP_PER_LEVEL) * 100;
    }

    public function getRankAttribute(): string
    {
        return match (true) {
            $this->level >= 50 => 'Дон',
            $this->level >= 30 => 'Подземен бос',
            $this->level >= 20 => 'Капо',
            $this->level >= 10 => 'Гангстер',
            $this->level >= 5  => 'Съучастник',
            default            => 'Новобранец',
        };
    }
}
