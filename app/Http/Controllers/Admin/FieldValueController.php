<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldGroup;
use App\Models\FieldValue;
use Illuminate\Http\Request;

class FieldValueController extends Controller
{
    public function index(string $location = 'home')
    {
        $fieldGroups = FieldGroup::where('location', $location)
            ->where('active', true)
            ->with(['fields' => function ($query) {
                $query->whereNull('parent_field_id')->with('subFields')->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        // Load all field values for this location
        $allFieldValues = FieldValue::where('entity_type', 'page')
            ->where('entity_id', $location)
            ->get();

        // Organize field values by field_id and row_index
        $fieldValues = $allFieldValues->keyBy(function ($value) {
            return $value->field_id.'_'.($value->row_index ?? '0');
        });

        // For repeater fields, group by field_id
        $repeaterValues = [];
        foreach ($allFieldValues->whereNotNull('row_index') as $value) {
            if (! isset($repeaterValues[$value->field_id])) {
                $repeaterValues[$value->field_id] = [];
            }
            $repeaterValues[$value->field_id][$value->row_index] = $value->meta_value;
        }

        // Sort repeater rows by index
        foreach ($repeaterValues as $fieldId => $rows) {
            ksort($rows);
            $repeaterValues[$fieldId] = array_values($rows);
        }

        return view('admin.field-editor', [
            'location' => $location,
            'fieldGroups' => $fieldGroups,
            'fieldValues' => $fieldValues,
            'repeaterValues' => $repeaterValues,
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'location' => 'required|string',
            'fields' => 'required|array',
            'fields.*.field_id' => 'required|exists:acf_fields,id',
            'fields.*.value' => 'nullable',
            'fields.*.meta_value' => 'nullable',
        ]);

        $location = $validated['location'];
        $entityType = 'page';

        foreach ($validated['fields'] as $fieldId => $fieldData) {
            $field = Field::findOrFail($fieldData['field_id']);

            // Handle repeater fields
            if ($field->type === 'repeater' && isset($fieldData['meta_value']) && is_array($fieldData['meta_value'])) {
                // Delete existing rows for this repeater
                FieldValue::where('field_id', $field->id)
                    ->where('entity_type', $entityType)
                    ->where('entity_id', $location)
                    ->delete();

                // Create new rows
                foreach ($fieldData['meta_value'] as $rowIndex => $rowData) {
                    if (! empty($rowData)) {
                        FieldValue::create([
                            'field_id' => $field->id,
                            'entity_type' => $entityType,
                            'entity_id' => $location,
                            'row_index' => $rowIndex,
                            'meta_value' => $rowData,
                        ]);
                    }
                }
            } else {
                // Handle regular fields
                $value = $fieldData['value'] ?? null;
                $metaValue = null;

                // Store simple value
                FieldValue::updateOrCreate(
                    [
                        'field_id' => $field->id,
                        'entity_type' => $entityType,
                        'entity_id' => $location,
                        'row_index' => null,
                    ],
                    [
                        'value' => $value,
                        'meta_value' => $metaValue,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Field values updated successfully.');
    }

    public function getFieldValues(string $location = 'home'): \Illuminate\Http\JsonResponse
    {
        $fieldGroups = FieldGroup::where('location', $location)
            ->where('active', true)
            ->with(['fields' => function ($query) {
                $query->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        $values = [];

        foreach ($fieldGroups as $group) {
            foreach ($group->fields as $field) {
                if ($field->type === 'repeater') {
                    $repeaterValues = FieldValue::where('field_id', $field->id)
                        ->where('entity_type', 'page')
                        ->where('entity_id', $location)
                        ->orderBy('row_index')
                        ->get()
                        ->map(fn ($v) => $v->meta_value)
                        ->toArray();

                    $values[$field->name] = $repeaterValues;
                } else {
                    $fieldValue = FieldValue::where('field_id', $field->id)
                        ->where('entity_type', 'page')
                        ->where('entity_id', $location)
                        ->whereNull('row_index')
                        ->first();

                    $values[$field->name] = $fieldValue ? ($fieldValue->meta_value ?? $fieldValue->value) : ($field->default_value ?? null);
                }
            }
        }

        return response()->json($values);
    }
}
