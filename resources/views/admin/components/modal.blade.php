<div id="{{ $id ?? 'modal' }}" class="modal-overlay" onclick="if(event.target === this) this.classList.remove('active')">
    <div class="modal-content" style="{{ $width ?? '' }}">
        @if(isset($title))
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h3 style="font-size: 1.25rem; font-weight: 600;">{{ $title }}</h3>
            <button type="button" onclick="document.getElementById('{{ $id ?? 'modal' }}').classList.remove('active')" 
                    style="background: none; border: none; cursor: pointer; font-size: 1.5rem; color: #6b7280;">
                &times;
            </button>
        </div>
        @endif
        {{ $slot }}
    </div>
</div>
