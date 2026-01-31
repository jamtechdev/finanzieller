<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Lead;
use App\Models\Media;
use App\Models\Section;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_images' => Media::images()->count(),
            'total_videos' => Media::videos()->count(),
            'total_blogs' => Blog::count(),
            'new_leads' => Lead::new()->count(),
        ];

        $recentLeads = Lead::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('admin.pages.dashboard', compact('stats', 'recentLeads', 'recentBlogs'));
    }
}
