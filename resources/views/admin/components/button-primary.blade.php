<button type="{{ $type ?? 'button' }}" class="btn btn-primary {{ $class ?? '' }}" {{ $attributes }}>
    {{ $slot }}
</button>
