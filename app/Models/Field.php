<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    protected $table = 'acf_fields';

    protected $fillable = [
        'field_group_id',
        'parent_field_id',
        'label',
        'name',
        'type',
        'instructions',
        'required',
        'default_value',
        'placeholder',
        'order',
        'settings',
    ];

    protected function casts(): array
    {
        return [
            'required' => 'boolean',
            'order' => 'integer',
            'settings' => 'array',
        ];
    }

    public function fieldGroup(): BelongsTo
    {
        return $this->belongsTo(FieldGroup::class);
    }

    public function parentField(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'parent_field_id');
    }

    public function subFields(): HasMany
    {
        return $this->hasMany(Field::class, 'parent_field_id')->orderBy('order');
    }

    public function values(): HasMany
    {
        return $this->hasMany(FieldValue::class);
    }

    public function getValue(string $entityType = 'page', string $entityId = 'home', ?int $rowIndex = null): ?FieldValue
    {
        return $this->values()
            ->where('entity_type', $entityType)
            ->where('entity_id', $entityId)
            ->when($rowIndex !== null, fn ($q) => $q->where('row_index', $rowIndex))
            ->first();
    }
}
