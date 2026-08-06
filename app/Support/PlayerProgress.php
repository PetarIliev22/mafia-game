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
                'icon' => 'img/icons/levels/don.svg',
                'shield' => 'img/icons/level-shields/don-shield.png',
                'color' => '#9b59ff',
            ],

            $level >= 30 => [
                'name' => 'Подземен бос',
                'icon' => 'img/icons/levels/underboss.svg',
                'shield' => 'img/icons/level-shields/underboss-shield.png',
                'color' => '#d4af37',
            ],

            $level >= 20 => [
                'name' => 'Капо',
                'icon' => 'img/icons/levels/capo.svg',
                'shield' => 'img/icons/level-shields/capo-shield.png',
                'color' => '#d92731',
            ],

            $level >= 10 => [
                'name' => 'Гангстер',
                'icon' => 'img/icons/levels/gangster.svg',
                'shield' => 'img/icons/level-shields/gangster-shield.png',
                'color' => '#dc6b2f',
            ],

            $level >= 5 => [
                'name' => 'Съучастник',
                'icon' => 'img/icons/levels/associate.svg',
                'shield' => 'img/icons/level-shields/associate-shield.png',
                'color' => '#4f8edc',
            ],

            default => [
                'name' => 'Новобранец',
                'icon' => 'img/icons/levels/rookie.svg',
                'shield' => 'img/icons/level-shields/rookie-shield.png',
                'color' => '#8e8e93',
            ],
        };
    }
}
