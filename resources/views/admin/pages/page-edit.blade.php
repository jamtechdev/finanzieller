@extends('admin.layouts.app')

@section('title', $title)

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">{{ $title }}</h1>
        <a href="{{ $back_route }}" class="btn btn-secondary">← Back to Pages</a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #fef2f2; color: #dc2626; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $update_route }}" method="POST">
        @csrf
        @component('admin.components.card', ['title' => 'Page content (HTML allowed)'])
            <div class="form-group">
                <label class="form-label">Body content</label>
                <textarea name="body" class="form-input rich-editor" rows="20" placeholder="Write your content here...">{{ old('body', $content ?? '') }}</textarea>
                <p style="color: #6b7280; font-size: 0.875rem; margin-top: 0.5rem;">Use the toolbar for headings, paragraphs, lists, bold, italic, and links. Content is saved as HTML.</p>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        @endcomponent
    </form>
@endsection
