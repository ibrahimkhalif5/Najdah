<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('website_settings'));
        static::deleted(fn () => Cache::forget('website_settings'));
    }

    public static function getValue(string $key, ?string $default = null): ?string
    {
        return static::all()->keyBy('key')->get($key)?->value ?? $default;
    }

    public static function allCached(): \Illuminate\Support\Collection
    {
        return Cache::rememberForever('website_settings', fn () => static::all()->keyBy('key'));
    }
}
