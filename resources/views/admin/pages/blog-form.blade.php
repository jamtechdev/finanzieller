@extends('admin.layouts.app')

@section('title', $blog ? 'Edit Blog Post' : 'New Blog Post')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">{{ $blog ? 'Edit Blog Post' : 'Create New Blog Post' }}</h1>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">← Back to Blogs</a>
    </div>

    @if($errors->any())
        <div style="background: #fef2f2; color: #dc2626; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $blog ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($blog)
            @method('PUT')
        @endif

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
            <div>
                @component('admin.components.card', ['title' => 'Content'])
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-input" required
                               value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter blog title...">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-input" rows="2" 
                                  placeholder="Brief summary...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Content *</label>
                        <textarea name="content" class="form-input rich-editor" rows="15" required
                                  placeholder="Write your blog content here...">{{ old('content', $blog->content ?? '') }}</textarea>
                    </div>
                @endcomponent
            </div>
            
            <div>
                @component('admin.components.card', ['title' => 'Publishing'])
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" name="is_published" value="1" 
                                   {{ old('is_published', $blog->is_published ?? false) ? 'checked' : '' }}
                                   style="width: 1.25rem; height: 1.25rem;">
                            <span>Publish immediately</span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-input"
                               value="{{ old('author', $blog->author ?? Auth::user()->name ?? '') }}">
                    </div>
                @endcomponent

                <div style="margin-top: 1.5rem;">
                @component('admin.components.card', ['title' => 'Featured Image'])
                    @if($blog && $blog->featured_image)
                        <div style="margin-bottom: 1rem;">
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                 style="width: 100%; border-radius: 0.5rem;">
                        </div>
                    @endif
                    
                    <div class="form-group" style="margin-bottom: 0;">
                        <input type="file" name="featured_image" class="form-input" accept="image/*">
                        <small style="color: #6b7280;">Recommended: 1200x630px</small>
                    </div>
                @endcomponent
                </div>

                <div style="margin-top: 1.5rem;">
                    <button type="submit" class="btn btn-primary w-full">
                        {{ $blog ? 'Update Post' : 'Create Post' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
