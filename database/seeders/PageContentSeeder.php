<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            ['key' => 'hero_title', 'value' => 'Willkommen bei <br/> Niedrigzins24', 'type' => 'text', 'section' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Ob als Kapitalanlage oder zur Selbstnutzung – wir finden die passende Immobilie für Sie.', 'type' => 'textarea', 'section' => 'hero'],
            ['key' => 'about_title', 'value' => 'Ihr Weg zu finanzieller Sicherheit', 'type' => 'text', 'section' => 'about'],
            ['key' => 'about_text', 'value' => 'Denken Sie heute an morgen – und bauen Sie Ihr Vermögen mit Immobilien systematisch auf. In einer Zeit, in der Altersvorsorge und finanzielle Sicherheit immer wichtiger werden, bieten Immobilien eine stabile und krisensichere Grundlage.\n\nMit Niedrigzins24 erhalten Sie ein durchdachtes Konzept für Ihren Vermögensaufbau. Wir übernehmen den kompletten Prozess – von der Auswahl der passenden Immobilie über die Finanzierung bis hin zur Abwicklung.', 'type' => 'textarea', 'section' => 'about'],
        ];

        foreach ($contents as $content) {
            \App\Models\PageContent::updateOrCreate(['key' => $content['key']], $content);
        }
    }
}
