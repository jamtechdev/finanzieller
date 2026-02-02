@extends('admin.layouts.app')

@section('title', 'Image Manager')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Image Manager</h1>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('upload-modal').classList.add('active')">
            <span style="margin-right:0.5rem">+</span> Upload Image
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter by Category -->
    <div style="margin-bottom: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <a href="{{ route('admin.images') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-secondary' }}">All</a>
        @foreach($categories as $category)
            <a href="{{ route('admin.images', ['category' => $category]) }}" 
               class="btn {{ request('category') === $category ? 'btn-primary' : 'btn-secondary' }}">
                {{ ucfirst($category) }}
            </a>
        @endforeach
    </div>

    <!-- Images Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem;">
        @forelse($images as $image)
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="aspect-ratio: 1; background: #f3f4f6; position: relative;">
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text ?? $image->filename }}" 
                     style="width: 100%; height: 100%; object-fit: cover;">
                <div style="position: absolute; top: 0.5rem; right: 0.5rem; display: flex; gap: 0.25rem;">
                    <button type="button" class="btn btn-secondary copy-image-url" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;" 
                            data-url="/storage/{{ $image->path }}" title="Copy image URL">
                        📋 Copy URL
                    </button>
                    <button type="button" class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;"
                            onclick="openEditModal({{ $image->id }}, '{{ addslashes($image->title ?? '') }}', '{{ addslashes($image->category ?? '') }}', '{{ addslashes($image->alt_text ?? '') }}')">
                        ✏️
                    </button>
                    <form action="{{ route('admin.media.destroy', $image) }}" method="POST" style="display: inline;"
                          onsubmit="return confirm('Are you sure you want to delete this image?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">🗑️</button>
                    </form>
                </div>
            </div>
            <div style="padding: 0.75rem;">
                <div style="font-weight: 500; font-size: 0.875rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $image->title ?? $image->filename }}
                </div>
                <div style="font-size: 0.75rem; color: #6b7280;">
                    {{ $image->category ?? 'Uncategorized' }} • {{ number_format($image->size / 1024, 1) }} KB
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #6b7280;">
            <p>No images uploaded yet.</p>
            <button type="button" class="btn btn-primary" style="margin-top: 1rem;" 
                    onclick="document.getElementById('upload-modal').classList.add('active')">
                Upload Your First Image
            </button>
        </div>
        @endforelse
    </div>

    <div style="margin-top: 2rem;">
        {{ $images->links() }}
    </div>

    <!-- Upload Modal -->
    <div id="upload-modal" class="modal-overlay" onclick="if(event.target === this) this.classList.remove('active')">
        <div class="modal-content">
            <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem; font-weight: 600;">Upload New Image</h3>
            <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="image">
                
                <div class="form-group">
                    <label class="form-label">Select Image</label>
                    <input type="file" name="file" class="form-input" accept="image/*" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Title (optional)</label>
                    <input type="text" name="title" class="form-input" placeholder="Image title">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-input" list="categories" placeholder="e.g., hero, gallery, team">
                    <datalist id="categories">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">
                        @endforeach
                    </datalist>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Alt Text (for SEO)</label>
                    <input type="text" name="alt_text" class="form-input" placeholder="Describe the image">
                </div>
                
                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('upload-modal').classList.remove('active')">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="edit-modal" class="modal-overlay" onclick="if(event.target === this) this.classList.remove('active')">
        <div class="modal-content">
            <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem; font-weight: 600;">Edit Image Details</h3>
            <form id="edit-form" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="edit-title" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" id="edit-category" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Alt Text</label>
                    <input type="text" name="alt_text" id="edit-alt" class="form-input">
                </div>
                
                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('edit-modal').classList.remove('active')">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, title, category, alt) {
            document.getElementById('edit-form').action = `/admin/media/${id}`;
            document.getElementById('edit-title').value = title || '';
            document.getElementById('edit-category').value = category || '';
            document.getElementById('edit-alt').value = alt || '';
            document.getElementById('edit-modal').classList.add('active');
        }

        document.querySelectorAll('.copy-image-url').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var url = this.getAttribute('data-url');
                if (!url) return;
                navigator.clipboard.writeText(url).then(function() {
                    var label = btn.textContent;
                    btn.textContent = '✓ Copied!';
                    btn.style.background = '#10b981';
                    btn.style.color = '#fff';
                    setTimeout(function() {
                        btn.textContent = label;
                        btn.style.background = '';
                        btn.style.color = '';
                    }, 1500);
                }).catch(function() {
                    alert('Copy failed. URL: ' + url);
                });
            });
        });
    </script>
@endsection
