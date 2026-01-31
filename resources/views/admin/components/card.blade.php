<div class="card {{ $class ?? '' }}">
    @if(isset($title))
    <div class="card-header">
        {{ $title }}
    </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
