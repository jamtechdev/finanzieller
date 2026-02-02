<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * List all site pages with links to edit and last updated info.
     */
    public function index()
    {
        $pages = [
            [
                'name' => 'Homepage',
                'slug' => 'homepage',
                'description' => 'Hero, slider, stats, about, FAQ, contact sections',
                'edit_route' => route('admin.homepage'),
                'edit_label' => 'Edit Homepage',
                'updated_at' => Section::findByKey('homepage_hero')?->updated_at,
            ],
            // About Us (commented out)
            // [
            //     'name' => 'About Us',
            //     'slug' => 'about',
            //     'description' => 'About page content',
            //     'edit_route' => route('admin.about'),
            //     'edit_label' => 'Edit About',
            //     'updated_at' => Section::findByKey('about_content')?->updated_at ?? Section::findByKey('homepage_about')?->updated_at,
            // ],
            // Services (commented out)
            // [
            //     'name' => 'Services',
            //     'slug' => 'services',
            //     'description' => 'Services section content',
            //     'edit_route' => route('admin.services'),
            //     'edit_label' => 'Edit Services',
            //     'updated_at' => Section::findByKey('services')?->updated_at,
            // ],
            [
                'name' => 'Impressum',
                'slug' => 'impressum',
                'description' => 'Legal imprint page',
                'edit_route' => route('admin.pages.impressum'),
                'edit_label' => 'Edit Impressum',
                'updated_at' => Section::findByKey('impressum_page')?->updated_at,
            ],
            [
                'name' => 'Datenschutzerklärung',
                'slug' => 'datenschutz',
                'description' => 'Privacy policy page',
                'edit_route' => route('admin.pages.datenschutz'),
                'edit_label' => 'Edit Datenschutz',
                'updated_at' => Section::findByKey('datenschutz_page')?->updated_at,
            ],
        ];

        return view('admin.pages.pages-index', compact('pages'));
    }

    public function editImpressum()
    {
        $section = Section::findByKey('impressum_page');
        $content = $section ? ($section->data['body'] ?? '') : '';

        return view('admin.pages.page-edit', [
            'title' => 'Edit Impressum',
            'slug' => 'impressum',
            'content' => $content,
            'update_route' => route('admin.pages.impressum.update'),
            'back_route' => route('admin.pages.index'),
        ]);
    }

    public function updateImpressum(Request $request)
    {
        $request->validate(['body' => 'nullable|string']);

        Section::updateOrCreate(
            ['key' => 'impressum_page'],
            [
                'data' => ['body' => $request->input('body', '')],
                'type' => 'html',
                'order' => 0,
                'is_active' => true,
            ]
        );

        return redirect()->route('admin.pages.impressum')->with('success', 'Impressum updated successfully.');
    }

    public function editDatenschutz()
    {
        $section = Section::findByKey('datenschutz_page');
        $content = $section ? ($section->data['body'] ?? '') : '';

        return view('admin.pages.page-edit', [
            'title' => 'Edit Datenschutzerklärung',
            'slug' => 'datenschutz',
            'content' => $content,
            'update_route' => route('admin.pages.datenschutz.update'),
            'back_route' => route('admin.pages.index'),
        ]);
    }

    public function updateDatenschutz(Request $request)
    {
        $request->validate(['body' => 'nullable|string']);

        Section::updateOrCreate(
            ['key' => 'datenschutz_page'],
            [
                'data' => ['body' => $request->input('body', '')],
                'type' => 'html',
                'order' => 0,
                'is_active' => true,
            ]
        );

        return redirect()->route('admin.pages.datenschutz')->with('success', 'Datenschutzerklärung updated successfully.');
    }
}
