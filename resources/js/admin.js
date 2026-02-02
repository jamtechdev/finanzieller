// Admin main entry point
import './bootstrap';

// Import admin components
import { initImageUpload } from './admin/components/image-upload.js';
import { initVideoUpload } from './admin/components/video-upload.js';
import { initEditor, initEditorFor } from './admin/components/editor.js';

document.addEventListener('DOMContentLoaded', () => {
    console.log('Admin Dashboard loaded');

    // Initialize components
    initImageUpload();
    initVideoUpload();
    initEditor();

    // Expose for inline scripts (e.g. homepage add-slide)
    window.initRichEditorFor = initEditorFor;

    // Auto-hide success messages after 5 seconds
    const alerts = document.querySelectorAll('[style*="background: #d1fae5"]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });

    // Confirm before delete
    document.querySelectorAll('form[onsubmit*="confirm"]').forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });

    // Mobile Sidebar Toggle
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarClose = document.getElementById('sidebar-close');
    const sidebar = document.querySelector('.admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    if (sidebarToggle && sidebar && overlay) {
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        }

        sidebarToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleSidebar();
        });

        if (sidebarClose) {
            sidebarClose.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        overlay.addEventListener('click', () => {
            toggleSidebar();
        });

        // Close sidebar when clicking a nav link on mobile
        sidebar.querySelectorAll('.nav-item').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    toggleSidebar();
                }
            });
        });
    }
});

// Modal helpers
window.openModal = function (modalId) {
    document.getElementById(modalId).classList.add('active');
};

window.closeModal = function (modalId) {
    document.getElementById(modalId).classList.remove('active');
};

// Toast notification helper
window.showToast = function (message, type = 'success') {
    const toast = document.createElement('div');
    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        color: white;
        font-weight: 500;
        z-index: 9999;
        animation: slideIn 0.3s ease;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
    `;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
};
