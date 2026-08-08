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
        foreach (config('ranks') as $rank) {
            if ($level >= $rank['level']) {
                return $rank;
            }
        }

        return config('ranks')[array_key_last(config('ranks'))];
    }
}
