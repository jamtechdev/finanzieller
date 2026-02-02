<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use App\Models\Setting;

class FrontendController extends Controller
{
    // Default content - same as in admin
    private $defaultContent = [
        'homepage_hero' => [
            'title' => "Willkommen bei \nNiedrigzins24",
            'subtitle' => 'Ob als Kapitalanlage oder zur Selbstnutzung – wir finden die passende Immobilie für Sie.',
            'button_text' => 'mehr erfahren',
            'button_link' => '#Überuns',
        ],
        'homepage_slides' => [
            'items' => [
                [
                    'title' => 'Ihr Weg zu finanzieller Sicherheit',
                    'content' => "Denken Sie heute an morgen – und bauen Sie Ihr Vermögen mit Immobilien systematisch auf. In einer Zeit, in der Altersvorsorge und finanzielle Sicherheit immer wichtiger werden, bieten Immobilien eine stabile und krisensichere Grundlage.\n\nMit Niedrigzins24 erhalten Sie ein durchdachtes Konzept für Ihren Vermögensaufbau. Wir übernehmen den kompletten Prozess – von der Auswahl der passenden Immobilie über die Finanzierung bis hin zur Abwicklung. Sie profitieren von einem Full-Service-Paket, bei dem Sie entspannt die Füße hochlegen können, während Ihre Immobilie und die Zeit für Sie arbeiten.\n\nSo schaffen Sie sich Schritt für Schritt mehr Unabhängigkeit und eine sichere Basis für die Zukunft.",
                    'image' => '/images/about.png',
                    'button_text' => 'Jetzt kontaktieren',
                    'button_link' => '#kontakt',
                ],
                [
                    'title' => 'Ihr starker Partner für Verkauf und Kauf von Immobilien',
                    'content' => "Eine Immobilie zu kaufen oder zu verkaufen ist eine wichtige Entscheidung – und genau dabei stehen wir Ihnen mit Erfahrung und Marktkenntnis zur Seite. Als Ihr persönlicher Immobilienmakler begleiten wir Sie von der ersten Besichtigung bis zum erfolgreichen Abschluss.\n\nUnser Vorteil für Sie: Wir verbinden tiefes Fachwissen über Immobilien mit einem sicheren Gespür für den Markt. Das bedeutet für Sie eine realistische Einschätzung von Wert und Potenzial, eine professionelle Präsentation Ihrer Immobilie und eine zielgerichtete Vermittlung an passende Käufer oder Verkäufer.\n\nMit Niedrigzins24 sparen Sie Zeit, vermeiden unnötige Risiken und gewinnen einen Partner, der Ihre Interessen zuverlässig vertritt. So wird Ihre Immobilienvermittlung effizient, transparent und erfolgreich.",
                    'image' => '/images/slide6.png',
                    'button_text' => 'Jetzt kontaktieren',
                    'button_link' => '#kontakt',
                ],
                [
                    'title' => 'Individuelle Baufinanzierung statt Standardlösung',
                    'content' => "Die richtige Finanzierung ist der Schlüssel zu einer sicheren Investition. Als freier und unabhängiger Vermittler haben wir Zugriff auf über 500 Banken – und vergleichen für Sie neutral die besten Angebote am Markt.\n\nBei Niedrigzins24 gibt es keine Standardlösungen. Gemeinsam mit Ihnen entwickeln wir ein Finanzierungskonzept, das exakt zu Ihrer Situation passt – flexibel, transparent und auf Ihre Ziele zugeschnitten. So profitieren Sie nicht nur von Top-Konditionen, sondern auch von einer Baufinanzierung, die langfristig Sicherheit bietet.\n\nIhr Vorteil: Sie behalten die volle Kontrolle, während wir Ihnen die Arbeit der Recherche und Verhandlung abnehmen. Das Ergebnis: die optimale Finanzierung für Ihr Immobilienprojekt – unabhängig, individuell und fair.",
                    'image' => '/images/slide7.png',
                    'button_text' => 'Jetzt kontaktieren',
                    'button_link' => '#kontakt',
                ],
            ],
        ],
        'homepage_stats' => [
            'items' => [
                ['icon' => '/images/icons/icons1.png', 'value' => '400', 'label' => 'Projektfinanzierungen'],
                ['icon' => '/images/icons/icons3.png', 'value' => '1029', 'label' => 'Zufriedene Kunden'],
                ['icon' => '/images/icons/icons2.png', 'value' => '500', 'label' => 'Jahre Erfahrung'],
            ],
        ],
        'homepage_about' => [
            'title' => 'Über Niedrigzins24',
            'content' => "Bei Niedrigzins24 verbinden wir Fachwissen aus der Baupraxis mit langjähriger Erfahrung in der Immobilienvermittlung und Finanzierung. Unser Ziel ist es, Ihnen eine Beratung zu bieten, die weit über das Übliche hinausgeht.\n\nDer Gründer von Niedrigzins24 blickt auf eine fundierte Ausbildung und jahrelange Berufserfahrung im Bauwesen zurück: vom Zimmermann über die Tätigkeit als staatlich geprüfter Bautechniker bis hin zur Spezialisierung auf Immobilienvermittlung und Baufinanzierungen. Dieses Zusammenspiel aus praktischer Baukompetenz und mehr als zehn Jahren Markterfahrung macht unsere Beratung einzigartig.\n\nFür Sie bedeutet das: Wir wissen genau, worauf es beim Erwerb einer Immobilie ankommt – ob als Kapitalanlage oder zur Eigennutzung. Von der ersten Besichtigung bis zum Vertragsabschluss prüfen wir nicht nur Lage, Potenzial und Rendite, sondern auch die Bausubstanz und den technischen Zustand. So erhalten Sie eine umfassende Einschätzung, die Sicherheit schafft und Fehlentscheidungen vermeidet.\n\nMit Niedrigzins24 haben Sie einen Partner an Ihrer Seite, der den Immobilienmarkt kennt, den Wert von Substanz einschätzen kann und Sie Schritt für Schritt durch den gesamten Prozess begleitet – transparent, kompetent und zuverlässig.",
            'image' => '/images/slide2.png',
        ],
        'homepage_faq' => [
            'items' => [
                [
                    'question' => 'Welche Leistungen bietet Niedrigzins-24 an?',
                    'answer' => 'Niedrigzins-24 berät umfassend zu Immobilienfinanzierungen, Immobilienkauf und -verkauf. Der Fokus liegt auf individuellen Finanzierungskonzepten sowie einer ganzheitlichen Begleitung von der Analyse bis zum Abschluss.',
                ],
                [
                    'question' => 'Wie unterstützt Niedrigzins-24 bei der Immobilienfinanzierung?',
                    'answer' => 'Als unabhängiger Finanzierungsvermittler vergleicht Niedrigzins-24 Angebote von mehr als 500 Banken, um für jede Situation die bestmöglichen Konditionen zu finden. Es gibt keine Standardlösungen, sondern maßgeschneiderte Konzepte.',
                ],
                [
                    'question' => 'Bleibt die Entscheidung über die Finanzierung bei mir?',
                    'answer' => 'Ja. Niedrigzins-24 übernimmt Analyse, Vergleich und Verhandlungen, die finale Entscheidung liegt jedoch immer beim Kunden. Es besteht volle Transparenz über alle Optionen.',
                ],
                [
                    'question' => 'Unterstützt Niedrigzins-24 Eigennutzer und Kapitalanleger?',
                    'answer' => 'Ja. Es werden sowohl Eigennutzer als auch Kapitalanleger betreut. Dabei werden Lage, Wirtschaftlichkeit, Zustand der Immobilie und langfristige Perspektiven berücksichtigt.',
                ],
                [
                    'question' => 'Was unterscheidet Niedrigzins-24 von klassischen Finanzierungsvermittlern?',
                    'answer' => 'Die Beratung kombiniert Finanzierungs-Know-how mit praktischer Immobilien- und Baukompetenz. Dadurch werden nicht nur Zinsen bewertet, sondern auch Substanz, Risiken und Entwicklungspotenziale einer Immobilie.',
                ],
                [
                    'question' => 'Wie kann ich Niedrigzins-24 kontaktieren?',
                    'answer' => 'Die Kontaktaufnahme ist telefonisch, per E-Mail oder über das Kontaktformular auf der Website möglich. Eine unverbindliche Erstberatung kann direkt angefragt werden.',
                ],
            ],
        ],
        'homepage_contact' => [
            'title' => 'Kontakt',
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2616.485558450143!2d8.309068!3d48.963242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4797040445a60001%3A0x6b907172b9a7616b!2sForchheim%2C%20Rheinstetten!5e0!3m2!1sen!2sde!4v1700000000000!5m2!1sen!2sde',
        ],
    ];

    public function home()
    {
        // Get sections from database or use defaults
        $heroSection = Section::getDataByKey('homepage_hero') ?? $this->defaultContent['homepage_hero'];
        $slidesSection = Section::getDataByKey('homepage_slides') ?? $this->defaultContent['homepage_slides'];
        $statsSection = Section::getDataByKey('homepage_stats') ?? $this->defaultContent['homepage_stats'];
        $aboutSection = Section::getDataByKey('homepage_about') ?? $this->defaultContent['homepage_about'];
        $faqSection = Section::getDataByKey('homepage_faq') ?? $this->defaultContent['homepage_faq'];
        $contactSection = Section::getDataByKey('homepage_contact') ?? $this->defaultContent['homepage_contact'];

        $settings = [
            'site_name' => Setting::get('site_name', 'Niedrigzins-24'),
            'contact_phone' => Setting::get('contact_phone'),
            'contact_email' => Setting::get('contact_email'),
            'contact_address' => Setting::get('contact_address'),
        ];

        return view('home', compact(
            'heroSection',
            'slidesSection',
            'statsSection',
            'aboutSection',
            'faqSection',
            'contactSection',
            'settings'
        ));
    }

    public function impressum()
    {
        $content = Section::getDataByKey('impressum_page', [
            'body' => '',
        ]);
        $settings = $this->getSettings();
        return view('impressum', compact('content', 'settings'));
    }

    public function datenschutz()
    {
        $content = Section::getDataByKey('datenschutz_page', [
            'body' => '',
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
        ];
    }
}
