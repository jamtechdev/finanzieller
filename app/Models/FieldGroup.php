<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FieldGroup extends Model
{
    protected $table = 'acf_field_groups';

    protected $fillable = [
        'title',
        'key',
        'location',
        'order',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function fields(): HasMany
    {
        return $this->hasMany(Field::class)->orderBy('order');
    }

    public function activeFields(): HasMany
    {
        return $this->fields()->whereNull('parent_field_id');
    }
}
