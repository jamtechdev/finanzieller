@php
    $footerBrand = \App\Models\Setting::get('footer_brand', 'Niedrigzins24');
    $footerCopyright = \App\Models\Setting::get('footer_copyright', '©Urheberrecht. Alle Rechte vorbehalten.');
    $socialLinksRaw = \App\Models\Setting::get('social_links');
    $socialLinks = $socialLinksRaw ? (is_string($socialLinksRaw) ? json_decode($socialLinksRaw, true) : $socialLinksRaw) : [];
    $socialLinks = is_array($socialLinks) ? $socialLinks : [];
    $socialIconMap = [
        'facebook' => ['fa' => 'fa-facebook', 'bi' => 'bi-facebook', 'label' => 'Facebook', 'image' => null],
        'instagram' => ['fa' => 'fa-instagram', 'bi' => 'bi-instagram', 'label' => 'Instagram', 'image' => null],
        'linkedin' => ['fa' => 'fa-linkedin', 'bi' => 'bi-linkedin', 'label' => 'LinkedIn', 'image' => null],
        'twitter' => ['fa' => 'fa-twitter', 'bi' => 'bi-twitter', 'label' => 'Twitter', 'image' => null],
        'youtube' => ['fa' => 'fa-youtube', 'bi' => 'bi-youtube', 'label' => 'YouTube', 'image' => null],
        'tiktok' => ['fa' => 'fa-brands fa-tiktok', 'bi' => 'bi-tiktok', 'label' => 'TikTok', 'image' => '/images/icons/tik-tok.png'],
        'link' => ['fa' => 'fa-link', 'bi' => 'bi-link-45deg', 'label' => 'Link', 'image' => null],
    ];
@endphp
<footer class="custom-footer-bg pt-5 footer" data-aos="zoom-in-down">
        <div class="container pb-5">
            <div class="row align-items-center">
                <div class="col-md-6 text-start">
                    <h1 class="brand-text mb-3  heading">{{ $footerBrand }}</h1>
                    <div class="footer-icons">
                        @foreach($socialLinks as $item)
                            @php
                                $icon = $socialIconMap[$item['icon'] ?? 'link'] ?? $socialIconMap['link'];
                            @endphp
                            <div>
                                <a href="{{ $item['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $icon['label'] }}">
                                    @if(!empty($icon['image']))
                                        <img src="{{ asset($icon['image']) }}" alt="{{ $icon['label'] }}" style="height: 1.25rem; width: auto; vertical-align: middle;">
                                    @else
                                        <i class="fa {{ $icon['fa'] }}" aria-hidden="true"></i>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex">
                        @foreach($socialLinks as $item)
                            @php
                                $icon = $socialIconMap[$item['icon'] ?? 'link'] ?? $socialIconMap['link'];
                            @endphp
                            <a href="{{ $item['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="{{ $icon['label'] }}">
                                @if(!empty($icon['image']))
                                    <img src="{{ asset($icon['image']) }}" alt="{{ $icon['label'] }}" style="height: 1.25rem; width: auto; vertical-align: middle;">
                                @else
                                    <i class="bi {{ $icon['bi'] }}"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6 text-md-end mt-4 mt-md-0">
                    <a href="{{ route('impressum') }}" class="footer-link me-5">Impressum</a>
                    <a href="{{ route('datenschutzerklarung') }}" class="footer-link">Datenschutzerklärung</a>
                </div>
            </div>
        </div>

        <div class="custom-bottom-bar py-3">
            <div class="container text-center">
                <small class="copyright-text">{{ $footerCopyright }}</small>
            </div>
        </div>
    </footer>