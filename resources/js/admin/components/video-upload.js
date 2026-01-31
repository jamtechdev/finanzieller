// Video Upload Handler
export function initVideoUpload() {
    const videoInputs = document.querySelectorAll('input[type="file"][accept*="video"]');

    videoInputs.forEach(input => {
        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                // Validate file size (100MB max)
                const maxSize = 100 * 1024 * 1024;
                if (file.size > maxSize) {
                    alert('Video file is too large. Maximum size is 100MB.');
                    this.value = '';
                    return;
                }

                // Show file name
                const label = this.parentElement.querySelector('.file-label');
                if (label) {
                    label.textContent = file.name;
                }
            }
        });
    });
}

// Video preview
export function createVideoPreview(file, container) {
    const video = document.createElement('video');
    video.src = URL.createObjectURL(file);
    video.controls = true;
    video.style.maxWidth = '100%';
    video.style.borderRadius = '0.5rem';

    container.innerHTML = '';
    container.appendChild(video);
}
