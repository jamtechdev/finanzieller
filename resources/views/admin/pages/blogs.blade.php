@extends('admin.layouts.app')

@section('title', 'Blog Manager')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Blog Manager</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <span style="margin-right:0.5rem">+</span> New Blog Post
        </a>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @component('admin.components.card')
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>
                            <div style="font-weight: 500;">{{ $blog->title }}</div>
                            <div style="font-size: 0.75rem; color: #6b7280;">{{ Str::limit($blog->excerpt, 60) }}</div>
                        </td>
                        <td>
                            @if($blog->is_published)
                                <span style="background: #d1fae5; color: #065f46; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500;">
                                    Published
                                </span>
                            @else
                                <span style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500;">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '-' }}
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-secondary" style="padding: 0.25rem 0.75rem;">
                                    Edit
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.75rem;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem; color: #6b7280;">
                            No blog posts yet. <a href="{{ route('admin.blogs.create') }}" style="color: var(--color-primary-accent);">Create your first post</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endcomponent

    <div style="margin-top: 2rem;">
        {{ $blogs->links() }}
    </div>
@endsection
