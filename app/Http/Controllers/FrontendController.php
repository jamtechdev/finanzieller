<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use App\Models\Setting;

class FrontendController extends Controller
{
    public function home()
    {
        $heroSection = Section::getDataByKey('homepage_hero', [
            'title' => 'Ihr Partner für Immobilienfinanzierung',
            'subtitle' => 'Wir begleiten Sie auf dem Weg zu Ihrer Traumimmobilie mit maßgeschneiderten Finanzierungslösungen.',
            'button_text' => 'Jetzt beraten lassen',
            'button_link' => '#contact',
        ]);

        $aboutSection = Section::getDataByKey('homepage_about', [
            'title' => 'Über Uns',
            'content' => '',
            'images' => [],
        ]);

        $statsSection = Section::getDataByKey('homepage_stats', [
            'items' => [
                ['icon' => 'images/icons/1.png', 'value' => '2,500+', 'label' => 'Zufriedene Kunden'],
                ['icon' => 'images/icons/2.png', 'value' => '€500M+', 'label' => 'Finanzierungsvolumen'],
                ['icon' => 'images/icons/3.png', 'value' => '15+', 'label' => 'Jahre Erfahrung'],
            ],
        ]);

        $faqSection = Section::getDataByKey('homepage_faq', [
            'items' => [],
        ]);

        $contactSection = Section::getDataByKey('homepage_contact', [
            'title' => 'Kontaktieren Sie uns',
            'map_embed' => '',
        ]);

        $settings = [
            'site_name' => Setting::get('site_name', 'Niedrigzins-24'),
            'contact_phone' => Setting::get('contact_phone'),
            'contact_email' => Setting::get('contact_email'),
            'contact_address' => Setting::get('contact_address'),
        ];

        return view('home', compact(
            'heroSection',
            'aboutSection',
            'statsSection',
            'faqSection',
            'contactSection',
            'settings'
        ));
    }

    public function impressum()
    {
        $content = Section::getDataByKey('impressum_page', [
            'content' => '',
        ]);
        $settings = $this->getSettings();
        return view('impressum', compact('content', 'settings'));
    }

    public function datenschutz()
    {
        $content = Section::getDataByKey('datenschutz_page', [
            'content' => '',
        ]);
        $settings = $this->getSettings();
        return view('datenschutzerklarung', compact('content', 'settings'));
    }

    public function blogs()
    {
        $blogs = Blog::published()->latest('published_at')->paginate(12);
        $settings = $this->getSettings();
        return view('blogs', compact('blogs', 'settings'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(3)
            ->get();
        $settings = $this->getSettings();
        return view('blog-detail', compact('blog', 'relatedBlogs', 'settings'));
    }

    private function getSettings(): array
    {
        return [
            'site_name' => Setting::get('site_name', 'Niedrigzins-24'),
            'site_logo' => Setting::get('site_logo'),
            'contact_phone' => Setting::get('contact_phone'),
            'contact_email' => Setting::get('contact_email'),
            'contact_address' => Setting::get('contact_address'),
            'social_facebook' => Setting::get('social_facebook'),
            'social_instagram' => Setting::get('social_instagram'),
            'social_linkedin' => Setting::get('social_linkedin'),
            'footer_text' => Setting::get('footer_text'),
        ];
    }
}
