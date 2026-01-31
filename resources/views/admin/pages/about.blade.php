@extends('admin.layouts.app')

@section('title', 'Edit About Page')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Edit About Page</h1>
        <button type="submit" form="about-form" class="btn btn-primary">
            <span style="margin-right:0.5rem">💾</span> Save Changes
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <form id="about-form" action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @component('admin.components.card', ['title' => 'About Page Content'])
            <div class="form-group">
                <label class="form-label">Page Title</label>
                <input type="text" name="about[title]" class="form-input" 
                       value="{{ $aboutContent['title'] ?? '' }}" placeholder="About Us">
            </div>
            
            <div class="form-group">
                <label class="form-label">Main Content</label>
                <textarea name="about[content]" class="form-input rich-editor" rows="10" 
                          placeholder="Write about your company...">{{ $aboutContent['content'] ?? '' }}</textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Our Mission</label>
                <textarea name="about[mission]" class="form-input" rows="4" 
                          placeholder="Your company mission...">{{ $aboutContent['mission'] ?? '' }}</textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Our Vision</label>
                <textarea name="about[vision]" class="form-input" rows="4" 
                          placeholder="Your company vision...">{{ $aboutContent['vision'] ?? '' }}</textarea>
            </div>
        @endcomponent
    </form>
@endsection
