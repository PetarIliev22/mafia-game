<?php

namespace App\Support;

class SupabaseStorage
{
    public static function publicUrl(string $bucket, string $path): string
    {
        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . trim($bucket, '/')
            . '/'
            . ltrim($path, '/');
    }
}