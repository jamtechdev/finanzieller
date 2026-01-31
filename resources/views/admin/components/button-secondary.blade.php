<button type="{{ $type ?? 'button' }}" class="btn btn-secondary {{ $class ?? '' }}" {{ $attributes ?? '' }}>
    {{ $slot }}
</button>
