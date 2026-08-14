<?php

namespace App\Models;

use App\Enums\GameStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Game extends Model
{
    protected $fillable = [
        'host_id',
        'code',
        'name',
        'max_players',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => GameStatus::class,
        ];
    }

    public function host(): BelongsTo
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function players(): HasMany
    {
        return $this->hasMany(GamePlayer::class);
    }

    public static function generateCode(): string
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (self::where('code', $code)->exists());

        return $code;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            GameStatus::Waiting => 'Лоби',
            GameStatus::Active => 'В игра',
            GameStatus::Finished => 'Завършена',
        };
    }

    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            GameStatus::Waiting => 'is-waiting',
            GameStatus::Active => 'is-active',
            GameStatus::Finished => 'is-finished',
        };
    }
}