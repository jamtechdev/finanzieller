@extends('layouts.admin')

@section('title', 'Field Editor - ' . ucfirst($location))

@section('content')
<form action="{{ route('admin.field-editor.store') }}" method="POST" class="space-y-8" x-data="fieldEditor()">
    @csrf
    <input type="hidden" name="location" value="{{ $location }}">
    
    <div class="flex justify-between items-center bg-gray-800/50 backdrop-blur-xl p-6 rounded-xl shadow-lg border border-gray-700">
        <div>
            <h3 class="text-2xl font-bold text-white">Dynamic Field Editor</h3>
            <p class="text-sm text-gray-400 mt-1">Manage content for: <span class="font-semibold text-indigo-400">{{ ucfirst($location) }} Page</span></p>
        </div>
        <button
            type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-medium shadow-lg shadow-indigo-500/20"
        >
            Save All Changes
        </button>
    </div>

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach($fieldGroups as $group)
        <div class="bg-gray-800/50 backdrop-blur-xl p-6 rounded-xl shadow-lg border border-gray-700">
            <h4 class="text-xl font-semibold text-white uppercase tracking-wider mb-6 border-b border-gray-700 pb-3">
                {{ $group->title }}
            </h4>
            
            <div class="space-y-6">
                @foreach($group->fields as $field)
                    @php
                        $fieldValue = $fieldValues->get($field->id . '_0');
                        $currentValue = $fieldValue ? ($fieldValue->meta_value ?? $fieldValue->value) : ($field->default_value ?? '');
                    @endphp

                    @if($field->type === 'repeater')
                        @php
                            $repeaterData = $repeaterValues[$field->id] ?? [];
                        @endphp
                        <div class="space-y-4" x-data="{ rows: @js($repeaterData) }">
                            <div class="flex justify-between items-center">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">
                                        {{ $field->label }}
                                        @if($field->required)
                                            <span class="text-red-400">*</span>
                                        @endif
                                    </label>
                                    @if($field->instructions)
                                        <p class="text-xs text-gray-500">{{ $field->instructions }}</p>
                                    @endif
                                </div>
                                <button
                                    type="button"
                                    @click="rows.push({})"
                                    class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded-lg hover:bg-indigo-700 transition-colors"
                                >
                                    + Add Row
                                </button>
                            </div>

                            <template x-for="(row, rowIndex) in rows" :key="rowIndex">
                                <div class="bg-gray-900/50 p-4 rounded-lg border border-gray-700 space-y-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-sm font-medium text-gray-400">Row <span x-text="rowIndex + 1"></span></span>
                                        <button
                                            type="button"
                                            @click="rows.splice(rowIndex, 1)"
                                            class="text-red-400 hover:text-red-300 text-sm"
                                        >
                                            Remove
                                        </button>
                                    </div>

                                    @foreach($field->subFields as $subField)
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-300">
                                                {{ $subField->label }}
                                                @if($subField->required)
                                                    <span class="text-red-400">*</span>
                                                @endif
                                            </label>

                                            @if($subField->type === 'text')
                                                <input
                                                    type="text"
                                                    :name="`fields[{{ $field->id }}][meta_value][${rowIndex}][{{ $subField->name }}]`"
                                                    x-model="row['{{ $subField->name }}']"
                                                    placeholder="{{ $subField->placeholder }}"
                                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                            @elseif($subField->type === 'textarea')
                                                <textarea
                                                    :name="`fields[{{ $field->id }}][meta_value][${rowIndex}][{{ $subField->name }}]`"
                                                    x-model="row['{{ $subField->name }}']"
                                                    placeholder="{{ $subField->placeholder }}"
                                                    rows="3"
                                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                                ></textarea>
                                            @elseif($subField->type === 'editor')
                                                <textarea
                                                    :name="`fields[{{ $field->id }}][meta_value][${rowIndex}][{{ $subField->name }}]`"
                                                    x-model="row['{{ $subField->name }}']"
                                                    placeholder="{{ $subField->placeholder }}"
                                                    rows="5"
                                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm"
                                                ></textarea>
                                            @elseif($subField->type === 'number')
                                                <input
                                                    type="number"
                                                    :name="`fields[{{ $field->id }}][meta_value][${rowIndex}][{{ $subField->name }}]`"
                                                    x-model="row['{{ $subField->name }}']"
                                                    placeholder="{{ $subField->placeholder }}"
                                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                            @elseif($subField->type === 'image')
                                                <div class="flex items-center space-x-4">
                                                    <input
                                                        type="text"
                                                        :name="`fields[{{ $field->id }}][meta_value][${rowIndex}][{{ $subField->name }}]`"
                                                        x-model="row['{{ $subField->name }}']"
                                                        placeholder="/images/example.png"
                                                        class="flex-1 rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                                    >
                                                    <button
                                                        type="button"
                                                        class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600"
                                                        onclick="document.getElementById('image-selector-{{ $subField->id }}-' + rowIndex).click()"
                                                    >
                                                        Select Image
                                                    </button>
                                                    <input
                                                        type="file"
                                                        id="image-selector-{{ $subField->id }}-' + rowIndex"
                                                        class="hidden"
                                                        accept="image/*"
                                                        onchange="handleImageSelect(this, row['{{ $subField->name }}'])"
                                                    >
                                                </div>
                                                <div x-show="row['{{ $subField->name }}']" class="mt-2">
                                                    <img :src="row['{{ $subField->name }}']" alt="Preview" class="max-w-xs rounded-lg border border-gray-700">
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </template>

                            <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                        </div>
                    @else
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">
                                {{ $field->label }}
                                @if($field->required)
                                    <span class="text-red-400">*</span>
                                @endif
                            </label>
                            
                            @if($field->instructions)
                                <p class="text-xs text-gray-500 mb-2">{{ $field->instructions }}</p>
                            @endif

                            @if($field->type === 'text')
                                <input
                                    type="text"
                                    name="fields[{{ $field->id }}][value]"
                                    value="{{ old("fields.{$field->id}.value", $currentValue) }}"
                                    placeholder="{{ $field->placeholder }}"
                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                >
                                <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                            @elseif($field->type === 'textarea')
                                <textarea
                                    name="fields[{{ $field->id }}][value]"
                                    placeholder="{{ $field->placeholder }}"
                                    rows="4"
                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                >{{ old("fields.{$field->id}.value", $currentValue) }}</textarea>
                                <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                            @elseif($field->type === 'editor')
                                <textarea
                                    name="fields[{{ $field->id }}][value]"
                                    placeholder="{{ $field->placeholder }}"
                                    rows="8"
                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm"
                                >{{ old("fields.{$field->id}.value", $currentValue) }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">HTML is allowed. Use &lt;br/&gt; for line breaks.</p>
                                <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                            @elseif($field->type === 'number')
                                <input
                                    type="number"
                                    name="fields[{{ $field->id }}][value]"
                                    value="{{ old("fields.{$field->id}.value", $currentValue) }}"
                                    placeholder="{{ $field->placeholder }}"
                                    class="w-full rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                >
                                <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                            @elseif($field->type === 'image')
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-4">
                                        <input
                                            type="text"
                                            name="fields[{{ $field->id }}][value]"
                                            value="{{ old("fields.{$field->id}.value", $currentValue) }}"
                                            placeholder="/images/example.png"
                                            class="flex-1 rounded-md border-gray-600 bg-gray-900/50 text-white focus:ring-indigo-500 focus:border-indigo-500"
                                        >
                                        <button
                                            type="button"
                                            class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600"
                                            onclick="document.getElementById('image-selector-{{ $field->id }}').click()"
                                        >
                                            Select Image
                                        </button>
                                        <input
                                            type="file"
                                            id="image-selector-{{ $field->id }}"
                                            class="hidden"
                                            accept="image/*"
                                            onchange="handleImageSelect(this, 'fields[{{ $field->id }}][value]')"
                                        >
                                    </div>
                                    @if($currentValue)
                                        <div>
                                            <img src="{{ $currentValue }}" alt="Preview" class="max-w-xs rounded-lg border border-gray-700">
                                        </div>
                                    @endif
                                </div>
                                <input type="hidden" name="fields[{{ $field->id }}][field_id]" value="{{ $field->id }}">
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</form>

<script>
function fieldEditor() {
    return {
        init() {
            // Initialize any field editor functionality
        }
    }
}

function handleImageSelect(input, targetField) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // For now, we'll just show the preview
            // In production, you'd upload to server and get the path
            const preview = input.parentElement.parentElement.querySelector('img');
            if (preview) {
                preview.src = e.target.result;
            }
            // Update the input field if it's a direct field
            const textInput = input.parentElement.previousElementSibling;
            if (textInput && textInput.tagName === 'INPUT') {
                textInput.value = e.target.result;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
