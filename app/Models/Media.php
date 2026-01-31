<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'filename',
        'path',
        'type',
        'category',
        'title',
        'description',
        'alt_text',
        'size',
        'mime_type',
    ];

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }

    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
