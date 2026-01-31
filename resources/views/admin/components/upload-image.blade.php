<div class="upload-zone" style="border: 2px dashed #e5e7eb; border-radius: 0.5rem; padding: 2rem; text-align: center; cursor: pointer; transition: border-color 0.2s;"
     ondragover="this.style.borderColor='var(--color-primary-accent)'; event.preventDefault();"
     ondragleave="this.style.borderColor='#e5e7eb';"
     ondrop="handleDrop(event, '{{ $inputId ?? 'file-upload' }}')"
     onclick="document.getElementById('{{ $inputId ?? 'file-upload' }}').click()">
    
    <input type="file" id="{{ $inputId ?? 'file-upload' }}" name="{{ $name ?? 'file' }}" 
           accept="{{ $accept ?? 'image/*' }}" style="display: none;" 
           onchange="handleFileSelect(this, '{{ $previewId ?? 'preview' }}')"
           {{ ($multiple ?? false) ? 'multiple' : '' }}>
    
    <div id="{{ $previewId ?? 'preview' }}" style="margin-bottom: 1rem; display: none;">
        <img id="{{ $previewId ?? 'preview' }}-img" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 0.5rem;">
    </div>
    
    <div style="color: #6b7280;">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 0.5rem;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
        <p style="margin: 0; font-weight: 500;">{{ $label ?? 'Click to upload or drag and drop' }}</p>
        <p style="margin: 0.25rem 0 0; font-size: 0.875rem;">{{ $hint ?? 'PNG, JPG, GIF up to 10MB' }}</p>
    </div>
</div>

<script>
function handleDrop(event, inputId) {
    event.preventDefault();
    event.target.style.borderColor = '#e5e7eb';
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById(inputId).files = files;
    }
}

function handleFileSelect(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        const preview = document.getElementById(previewId);
        const previewImg = document.getElementById(previewId + '-img');
        
        reader.onload = function(e) {
            if (input.files[0].type.startsWith('image/')) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
