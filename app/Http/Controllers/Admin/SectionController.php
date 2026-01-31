<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function homepage()
    {
        $heroSection = Section::getDataByKey('homepage_hero', [
            'title' => '',
            'subtitle' => '',
            'button_text' => '',
            'button_link' => '',
            'background_image' => '',
        ]);

        $aboutSection = Section::getDataByKey('homepage_about', [
            'title' => '',
            'content' => '',
            'images' => [],
        ]);

        $statsSection = Section::getDataByKey('homepage_stats', [
            'items' => [],
        ]);

        $featuresSection = Section::getDataByKey('homepage_features', [
            'title' => '',
            'items' => [],
        ]);

        $faqSection = Section::getDataByKey('homepage_faq', [
            'items' => [],
        ]);

        $contactSection = Section::getDataByKey('homepage_contact', [
            'title' => '',
            'map_embed' => '',
        ]);

        return view('admin.pages.homepage', compact(
            'heroSection',
            'aboutSection',
            'statsSection',
            'featuresSection',
            'faqSection',
            'contactSection'
        ));
    }

    public function updateHomepage(Request $request)
    {
        $sections = [
            'homepage_hero' => $request->input('hero', []),
            'homepage_about' => $request->input('about', []),
            'homepage_stats' => $request->input('stats', []),
            'homepage_features' => $request->input('features', []),
            'homepage_faq' => $request->input('faq', []),
            'homepage_contact' => $request->input('contact', []),
        ];

        foreach ($sections as $key => $data) {
            Section::updateOrCreate(
                ['key' => $key],
                ['data' => $data, 'type' => 'content']
            );
        }

        return redirect()->back()->with('success', 'Homepage content updated successfully!');
    }

    public function about()
    {
        $aboutContent = Section::getDataByKey('about_page', [
            'title' => '',
            'content' => '',
            'team' => [],
            'mission' => '',
            'vision' => '',
        ]);

        return view('admin.pages.about', compact('aboutContent'));
    }

    public function updateAbout(Request $request)
    {
        Section::updateOrCreate(
            ['key' => 'about_page'],
            ['data' => $request->input('about', []), 'type' => 'page']
        );

        return redirect()->back()->with('success', 'About page updated successfully!');
    }

    public function services()
    {
        $services = Section::getDataByKey('services_list', [
            'title' => '',
            'items' => [],
        ]);

        return view('admin.pages.services', compact('services'));
    }

    public function updateServices(Request $request)
    {
        Section::updateOrCreate(
            ['key' => 'services_list'],
            ['data' => $request->input('services', []), 'type' => 'list']
        );

        return redirect()->back()->with('success', 'Services updated successfully!');
    }
}
