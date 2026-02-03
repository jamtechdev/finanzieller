<div class="upload-zone" style="border: 2px dashed #e5e7eb; border-radius: 0.5rem; padding: 2rem; text-align: center; cursor: pointer; transition: border-color 0.2s;"
     ondragover="this.style.borderColor='var(--color-primary-accent)'; event.preventDefault();"
     ondragleave="this.style.borderColor='#e5e7eb';"
     onclick="document.getElementById('{{ $inputId ?? 'video-upload' }}').click()">
    
    <input type="file" id="{{ $inputId ?? 'video-upload' }}" name="{{ $name ?? 'file' }}" 
           accept="video/*" style="display: none;">
    
    <div style="color: #6b7280;">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 0.5rem;"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
        <p style="margin: 0; font-weight: 500;">{{ __($label ?? 'Click to upload video') }}</p>
        <p style="margin: 0.25rem 0 0; font-size: 0.875rem;">{{ __($hint ?? 'MP4, WebM, AVI up to 100MB') }}</p>
    </div>
</div>
