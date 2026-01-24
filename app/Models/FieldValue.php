<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FieldValue extends Model
{
    protected $table = 'acf_field_values';

    protected $fillable = [
        'field_id',
        'entity_type',
        'entity_id',
        'row_index',
        'value',
        'meta_value',
    ];

    protected function casts(): array
    {
        return [
            'row_index' => 'integer',
            'meta_value' => 'array',
        ];
    }

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    public function getFormattedValue(): mixed
    {
        if ($this->meta_value !== null) {
            return $this->meta_value;
        }

        return $this->value;
    }
}
