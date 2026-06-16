<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan';

    protected $fillable = [
        'key',
        'value',
        'type',
        'group'
    ];

    /**
     * Get a setting value by key.
     * Uses cache to avoid repeated database lookups.
     *
     * @param  string  $key
     * @param  mixed|null  $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $cacheKey = 'pengaturan:' . $key;
        $ttl = config('cache.settings_ttl', 3600);

        return Cache::remember($cacheKey, $ttl, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Create or update a setting and refresh cache.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  string  $type
     * @param  string  $group
     * @return static
     */
    public static function set(string $key, mixed $value, string $type = 'text', string $group = 'general'): static
    {
        // If a setting already exists, preserve its group unless a specific group is provided
        $existing = static::where('key', $key)->first();
        $resolvedGroup = $existing ? ($group ?? $existing->group) : $group;

        // Ensure value is never null because the DB column is NOT NULL
        if (is_null($value)) {
            $value = '';
        }

        // Ensure we store a scalar; arrays/objects will be stringified
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }

        $model = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type, 'group' => $resolvedGroup]
        );

        $cacheKey = 'pengaturan:' . $key;
        $ttl = config('cache.settings_ttl', 3600);
        Cache::put($cacheKey, $value, $ttl);

        return $model;
    }
}
