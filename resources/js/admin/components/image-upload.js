// Image Upload Handler
export function initImageUpload() {
    const uploadZones = document.querySelectorAll('.upload-zone');

    uploadZones.forEach(zone => {
        zone.addEventListener('dragover', (e) => {
            e.preventDefault();
            zone.classList.add('drag-over');
        });

        zone.addEventListener('dragleave', () => {
            zone.classList.remove('drag-over');
        });

        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('drag-over');

            const input = zone.querySelector('input[type="file"]');
            if (input && e.dataTransfer.files.length > 0) {
                input.files = e.dataTransfer.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    });
}

// Preview image before upload
export function previewImage(input, previewElement) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            if (previewElement) {
                previewElement.src = e.target.result;
                previewElement.style.display = 'block';
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// AJAX Upload with progress
export async function uploadFile(file, url, onProgress = null) {
    const formData = new FormData();
    formData.append('file', file);

    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', (e) => {
            if (e.lengthComputable && onProgress) {
                const percentComplete = (e.loaded / e.total) * 100;
                onProgress(percentComplete);
            }
        });

        xhr.addEventListener('load', () => {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(JSON.parse(xhr.responseText));
            } else {
                reject(new Error('Upload failed'));
            }
        });

        xhr.addEventListener('error', () => reject(new Error('Upload failed')));

        xhr.open('POST', url);
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.send(formData);
    });
}
