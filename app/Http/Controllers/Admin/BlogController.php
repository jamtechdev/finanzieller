<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('admin.pages.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('admin.pages.blog-form', ['blog' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|max:5120',
            'is_published' => 'boolean',
        ]);

        $data = $request->only(['title', 'content', 'excerpt', 'author']);
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->boolean('is_published');
        
        if ($request->boolean('is_published')) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $data['featured_image'] = $file->storeAs('uploads/blogs', $filename, 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.pages.blog-form', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|max:5120',
            'is_published' => 'boolean',
        ]);

        $data = $request->only(['title', 'content', 'excerpt', 'author']);
        $data['is_published'] = $request->boolean('is_published');
        
        if ($request->boolean('is_published') && !$blog->published_at) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $file = $request->file('featured_image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $data['featured_image'] = $file->storeAs('uploads/blogs', $filename, 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
