<?php

namespace App\Support;

class PlayerProgress
{
    public const XP_PER_LEVEL = 1000;

    public static function level(int $xp): int
    {
        return intdiv($xp, self::XP_PER_LEVEL);
    }

    public static function currentXp(int $xp): int
    {
        return $xp % self::XP_PER_LEVEL;
    }

    public static function remainingXp(int $xp): int
    {
        return self::XP_PER_LEVEL - self::currentXp($xp);
    }

    public static function progress(int $xp): float
    {
        return self::currentXp($xp) / self::XP_PER_LEVEL * 100;
    }

    public static function rank(int $level): array
    {
        return match (true) {
            $level >= 50 => [
                'name' => 'Дон',
                'icon' => 'bi-gem',
                'color' => '#9b59ff',
            ],

            $level >= 30 => [
                'name' => 'Подземен бос',
                'icon' => 'bi-suit-spade-fill',
                'color' => '#d4af37',
            ],

            $level >= 20 => [
                'name' => 'Капо',
                'icon' => 'bi-shield-fill',
                'color' => '#d92731',
            ],

            $level >= 10 => [
                'name' => 'Гангстер',
                'icon' => 'bi-fire',
                'color' => '#dc6b2f',
            ],

            $level >= 5 => [
                'name' => 'Съучастник',
                'icon' => 'bi-person-badge-fill',
                'color' => '#4f8edc',
            ],

            default => [
                'name' => 'Новобранец',
                'icon' => 'bi-shield',
                'color' => '#8e8e93',
            ],
        };
    }
}
