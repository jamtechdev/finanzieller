<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HeaderFooterController extends Controller
{
    public function index()
    {
        $menuItems = json_decode(Setting::get('header_menu_items', '[]'), true) ?: [];
        $headerMenuText = self::menuItemsToText($menuItems);

        return view('admin.pages.header-footer', [
            'headerMenuText' => $headerMenuText,
            'footer_brand' => Setting::get('footer_brand', 'Niedrigzins24'),
            'footer_copyright' => Setting::get('footer_copyright', '©Urheberrecht. Alle Rechte vorbehalten.'),
        ]);
    }

    public function update(Request $request)
    {
        if ($request->has('header_menu_items')) {
            $lines = array_filter(array_map('trim', explode("\n", $request->input('header_menu_items', ''))));
            $items = [];
            foreach ($lines as $line) {
                $parts = array_map('trim', explode('|', $line, 2));
                if (count($parts) >= 2) {
                    $items[] = ['label' => $parts[0], 'url' => $parts[1]];
                }
            }
            Setting::set('header_menu_items', json_encode($items), 'json', 'header');
        }

        if ($request->has('footer_brand')) {
            Setting::set('footer_brand', $request->input('footer_brand'), 'text', 'footer');
        }
        if ($request->has('footer_copyright')) {
            Setting::set('footer_copyright', $request->input('footer_copyright'), 'text', 'footer');
        }

        return redirect()->route('admin.header-footer')->with('success', 'Header & footer updated successfully.');
    }

    private static function menuItemsToText(array $items): string
    {
        $lines = [];
        foreach ($items as $item) {
            $label = $item['label'] ?? '';
            $url = $item['url'] ?? '#';
            $lines[] = $label . '|' . $url;
        }
        return implode("\n", $lines);
    }
}
