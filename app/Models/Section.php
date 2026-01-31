<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    protected $fillable = [
        'page_id',
        'key',
        'type',
        'data',
        'order',
        'is_active',
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public static function findByKey(string $key): ?self
    {
        return self::where('key', $key)->where('is_active', true)->first();
    }

    public static function getDataByKey(string $key, $default = null)
    {
        $section = self::findByKey($key);
        return $section ? $section->data : $default;
    }
}
