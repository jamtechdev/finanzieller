<div class="card">
    <div class="stat-card">
        <div>
            <div class="stat-value">{{ $value }}</div>
            <div class="stat-label">{{ $label }}</div>
        </div>
        @if(isset($icon))
        <div style="color: var(--color-primary-accent); opacity: 0.8;">
            {!! $icon !!}
        </div>
        @endif
    </div>
</div>
