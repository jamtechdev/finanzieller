<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class)->orderBy('order');
    }

    public static function findBySlug(string $slug): ?self
    {
        return self::where('slug', $slug)->first();
    }
}
