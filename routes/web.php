<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Models\Field;
use App\Models\FieldValue;
use App\Models\PageContent;

Route::get('/', function () {
    // Get field values for home page
    $fieldValues = [];
    $fields = Field::whereHas('fieldGroup', function ($query) {
        $query->where('location', 'home')->where('active', true);
    })->get();

    foreach ($fields as $field) {
        if ($field->type === 'repeater') {
            $repeaterValues = FieldValue::where('field_id', $field->id)
                ->where('entity_type', 'page')
                ->where('entity_id', 'home')
                ->orderBy('row_index')
                ->get()
                ->map(fn ($v) => $v->meta_value)
                ->toArray();
            $fieldValues[$field->name] = $repeaterValues;
        } else {
            $value = FieldValue::where('field_id', $field->id)
                ->where('entity_type', 'page')
                ->where('entity_id', 'home')
                ->whereNull('row_index')
                ->first();
            $fieldValues[$field->name] = $value ? ($value->meta_value ?? $value->value) : ($field->default_value ?? null);
        }
    }

    // Keep old PageContent for backward compatibility
    $contents = PageContent::all()->pluck('value', 'key');

    return view('home', [
        'contents' => $contents,
        'fields' => $fieldValues,
    ]);
})->name('home');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/datenschutzerklarung', function () {
    return view('datenschutzerklarung');
})->name('datenschutzerklarung');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/page-editor', [AdminController::class, 'pageEditor'])->name('page-editor');
    Route::post('/page-editor', [AdminController::class, 'updatePageContent'])->name('page-editor.update');

    // ACF-like Field Editor
    Route::get('/field-editor/{location?}', [\App\Http\Controllers\Admin\FieldValueController::class, 'index'])->name('field-editor');
    Route::post('/field-editor', [\App\Http\Controllers\Admin\FieldValueController::class, 'store'])->name('field-editor.store');
    Route::get('/api/field-values/{location?}', [\App\Http\Controllers\Admin\FieldValueController::class, 'getFieldValues'])->name('api.field-values');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
