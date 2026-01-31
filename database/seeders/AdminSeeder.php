<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // Create default settings
        $defaultSettings = [
            'site_name' => 'Niedrigzins-24',
            'contact_email' => 'info@niedrigzins-24.de',
            'contact_phone' => '+49 123 456789',
            'contact_address' => 'Musterstraße 1, 12345 Berlin',
            'footer_text' => '© ' . date('Y') . ' Niedrigzins-24. All rights reserved.',
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::set($key, $value);
        }

        // Create default homepage sections
        Section::updateOrCreate(
            ['key' => 'homepage_hero'],
            [
                'type' => 'hero',
                'data' => [
                    'title' => 'Ihr Partner für Immobilienfinanzierung',
                    'subtitle' => 'Wir begleiten Sie auf dem Weg zu Ihrer Traumimmobilie mit maßgeschneiderten Finanzierungslösungen.',
                    'button_text' => 'Jetzt beraten lassen',
                    'button_link' => '#contact',
                ],
            ]
        );

        Section::updateOrCreate(
            ['key' => 'homepage_about'],
            [
                'type' => 'content',
                'data' => [
                    'title' => 'Über Uns',
                    'content' => 'Niedrigzins-24 berät umfassend zu Immobilienfinanzierungen, Immobilienkauf und -verkauf. Der Fokus liegt auf individuellen Finanzierungskonzepten sowie einer ganzheitlichen Begleitung von der Analyse bis zum Abschluss.',
                    'images' => [],
                ],
            ]
        );

        Section::updateOrCreate(
            ['key' => 'homepage_stats'],
            [
                'type' => 'stats',
                'data' => [
                    'items' => [
                        ['icon' => 'images/icons/1.png', 'value' => '2,500+', 'label' => 'Zufriedene Kunden'],
                        ['icon' => 'images/icons/2.png', 'value' => '€500M+', 'label' => 'Finanzierungsvolumen'],
                        ['icon' => 'images/icons/3.png', 'value' => '15+', 'label' => 'Jahre Erfahrung'],
                    ],
                ],
            ]
        );

        Section::updateOrCreate(
            ['key' => 'homepage_faq'],
            [
                'type' => 'faq',
                'data' => [
                    'items' => [
                        [
                            'question' => 'Was bietet Niedrigzins-24 an?',
                            'answer' => 'Niedrigzins-24 berät umfassend zu Immobilienfinanzierungen, Immobilienkauf und -verkauf. Der Fokus liegt auf individuellen Finanzierungskonzepten sowie einer ganzheitlichen Begleitung von der Analyse bis zum Abschluss.',
                        ],
                        [
                            'question' => 'Wie läuft die Beratung ab?',
                            'answer' => 'Zunächst analysieren wir Ihre persönliche Situation und Ihre Wünsche. Dann erstellen wir ein maßgeschneidertes Finanzierungskonzept und begleiten Sie durch den gesamten Prozess.',
                        ],
                    ],
                ],
            ]
        );

        Section::updateOrCreate(
            ['key' => 'homepage_contact'],
            [
                'type' => 'contact',
                'data' => [
                    'title' => 'Kontaktieren Sie uns',
                    'map_embed' => '',
                ],
            ]
        );
    }
}
