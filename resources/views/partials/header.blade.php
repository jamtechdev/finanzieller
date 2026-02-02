@php
    $menuItems = json_decode(\App\Models\Setting::get('header_menu_items', '[]'), true) ?: [];
    if (empty($menuItems)) {
        $menuItems = [
            ['label' => 'Startseite', 'url' => '/'],
            ['label' => 'Über uns', 'url' => '#Überuns'],
            ['label' => 'Kontakt', 'url' => '#kontakt'],
        ];
    }
    $headerLogoText = \App\Models\Setting::get('site_name', 'Niedrigzins24');
    $headerLogoImage = \App\Models\Setting::get('site_logo');
@endphp
<header class="site-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center" style='width:100%;justify-content:space-between'>
<a href="/" class="logo">
    @if($headerLogoImage)
        <img src="{{ asset('storage/' . $headerLogoImage) }}" alt="{{ $headerLogoText }}" style="max-height: 40px; width: auto;">
    @else
        {{ $headerLogoText }}
    @endif
</a>
    
        <nav class="nav-container">
            <button class="hamburger" aria-label="Toggle menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <ul class="nav-menu">
                @foreach($menuItems as $item)
                    <li><a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] ?? '' }}</a></li>
                @endforeach
            </ul>
        </nav>
        </div>
    </div>
</header>

<div class="preview-bg"></div>