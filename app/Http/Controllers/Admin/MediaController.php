<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function images()
    {
        $images = Media::images()->latest()->paginate(20);
        $categories = Media::images()->distinct()->pluck('category')->filter();
        return view('admin.pages.images', compact('images', 'categories'));
    }

    public function videos()
    {
        $videos = Media::videos()->latest()->paginate(20);
        return view('admin.pages.videos', compact('videos'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:102400', // 100MB max
            'type' => 'required|in:image,video',
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $type = $request->input('type');
        $folder = $type === 'image' ? 'images' : 'videos';
        
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("uploads/{$folder}", $filename, 'public');

        $media = Media::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => $type,
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'alt_text' => $request->input('alt_text'),
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'media' => $media,
                'url' => $media->url,
            ]);
        }

        return redirect()->back()->with('success', ucfirst($type) . ' uploaded successfully!');
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $media->update($request->only(['category', 'title', 'description', 'alt_text']));

        return redirect()->back()->with('success', 'Media updated successfully!');
    }

    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->path);
        $media->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Media deleted successfully!');
    }

    public function replace(Request $request, Media $media)
    {
        $request->validate([
            'file' => 'required|file|max:102400',
        ]);

        // Delete old file
        Storage::disk('public')->delete($media->path);

        // Upload new file
        $file = $request->file('file');
        $folder = $media->type === 'image' ? 'images' : 'videos';
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("uploads/{$folder}", $filename, 'public');

        $media->update([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        return redirect()->back()->with('success', 'Media replaced successfully!');
    }
}
