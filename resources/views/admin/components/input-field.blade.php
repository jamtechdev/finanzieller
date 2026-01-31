<div class="form-group">
    @if(isset($label))
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-input {{ $class ?? '' }}" value="{{ $value ?? '' }}" {{ $attributes }}>
    @error($name)
        <span style="color: var(--color-danger); font-size: 0.875rem;">{{ $message }}</span>
    @enderror
</div>
