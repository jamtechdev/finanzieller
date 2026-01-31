@extends('admin.layouts.app')

@section('title', 'Video Manager')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Video Manager</h1>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('upload-modal').classList.add('active')">
            <span style="margin-right:0.5rem">+</span> Upload Video
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Videos Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
        @forelse($videos as $video)
        <div class="card" style="padding: 0; overflow: hidden;">
            <div style="aspect-ratio: 16/9; background: #1f2937; position: relative;">
                <video src="{{ asset('storage/' . $video->path) }}" style="width: 100%; height: 100%; object-fit: cover;"></video>
                <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;">
                    <span style="width: 60px; height: 60px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                          onclick="this.parentElement.previousElementSibling.play()">
                        ▶️
                    </span>
                </div>
                <div style="position: absolute; top: 0.5rem; right: 0.5rem; display: flex; gap: 0.25rem;">
                    <form action="{{ route('admin.media.destroy', $video) }}" method="POST" style="display: inline;"
                          onsubmit="return confirm('Are you sure you want to delete this video?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">🗑️</button>
                    </form>
                </div>
            </div>
            <div style="padding: 1rem;">
                <div style="font-weight: 500; margin-bottom: 0.25rem;">{{ $video->title ?? $video->filename }}</div>
                <div style="font-size: 0.875rem; color: #6b7280;">
                    {{ $video->description ?? 'No description' }}
                </div>
                <div style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.5rem;">
                    {{ number_format($video->size / (1024 * 1024), 2) }} MB
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #6b7280;">
            <p>No videos uploaded yet.</p>
            <button type="button" class="btn btn-primary" style="margin-top: 1rem;" 
                    onclick="document.getElementById('upload-modal').classList.add('active')">
                Upload Your First Video
            </button>
        </div>
        @endforelse
    </div>

    <div style="margin-top: 2rem;">
        {{ $videos->links() }}
    </div>

    <!-- Upload Modal -->
    <div id="upload-modal" class="modal-overlay" onclick="if(event.target === this) this.classList.remove('active')">
        <div class="modal-content">
            <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem; font-weight: 600;">Upload New Video</h3>
            <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="video">
                
                <div class="form-group">
                    <label class="form-label">Select Video</label>
                    <input type="file" name="file" class="form-input" accept="video/*" required>
                    <small style="color: #6b7280;">Max file size: 100MB</small>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input" placeholder="Video title">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input" rows="3" placeholder="Video description..."></textarea>
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
@endsection
