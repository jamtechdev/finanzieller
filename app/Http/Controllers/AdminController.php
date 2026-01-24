<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'users' => \App\Models\User::count(),
                'content_blocks' => \App\Models\PageContent::count(),
            ],
        ]);
    }

    public function pageEditor()
    {
        return view('admin.page-editor', [
            'contents' => \App\Models\PageContent::all(),
        ]);
    }

    public function updatePageContent(Request $request)
    {
        $request->validate([
            'contents' => 'required|array',
            'contents.*.id' => 'required|exists:page_contents,id',
            'contents.*.value' => 'nullable|string',
        ]);

        foreach ($request->contents as $item) {
            \App\Models\PageContent::where('id', $item['id'])->update(['value' => $item['value']]);
        }

        return back()->with('success', 'Content updated successfully.');
    }
}
