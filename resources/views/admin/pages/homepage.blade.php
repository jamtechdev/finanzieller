@extends('admin.layouts.app')

@section('title', __('Edit Homepage'))

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">{{ __('Edit Homepage Content') }}</h1>
        <button type="submit" form="homepage-form" class="btn btn-primary">
            <span style="margin-right:0.5rem">💾</span> {{ __('Save All Changes') }}
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    <form id="homepage-form" action="{{ route('admin.homepage.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Hero Section -->
        @component('admin.components.card', ['title' => '🎯 ' . __('Hero Section (Main Banner)')])
                <div class="form-group">
                    <label class="form-label">{{ __('Hero Title') }}</label>
                <textarea name="hero[title]" class="form-input" rows="2" placeholder="Main headline...">{{ $heroSection['title'] ?? '' }}</textarea>
                <small style="color: #6b7280;">{{ __('Use line breaks for multi-line text') }}</small>
            </div>
            <div class="form-group">
                <label class="form-label">Hero Subtitle</label>
                <textarea name="hero[subtitle]" class="form-input" rows="2" 
                          placeholder="Supporting text...">{{ $heroSection['subtitle'] ?? '' }}</textarea>
            </div>
            <div class="two-col-grid">
                <div class="form-group">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="hero[button_text]" class="form-input" 
                           value="{{ $heroSection['button_text'] ?? '' }}" placeholder="CTA button text">
                </div>
                <div class="form-group">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="hero[button_link]" class="form-input" 
                           value="{{ $heroSection['button_link'] ?? '' }}" placeholder="#contact or /page">
                </div>
            </div>
        @endcomponent

        <!-- Slides Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '🎠 Slider Sections (About Slides)'])
            <p style="color: #6b7280; margin-bottom: 1rem;">These are the rotating slides in the about section</p>
            <div id="slides-container">
                @php $slideItems = $slidesSection['items'] ?? []; @endphp
                @foreach($slideItems as $index => $slide)
                <div class="slide-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <strong style="font-size: 1.1rem;">{{ __('Slide') }} #{{ $index + 1 }}</strong>
                        <button type="button" class="btn btn-danger remove-slide" style="padding: 0.25rem 0.75rem;">{{ __('Remove') }}</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Slide Title</label>
                        <input type="text" name="slides[items][{{ $index }}][title]" class="form-input" 
                               value="{{ $slide['title'] ?? '' }}" placeholder="Slide headline">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Content</label>
                        <textarea name="slides[items][{{ $index }}][content]" class="form-input rich-editor" rows="6" 
                                  placeholder="Slide content... Use toolbar for paragraphs, lists, bold, links (HTML allowed)">{{ $slide['content'] ?? '' }}</textarea>
                    </div>
                    <div class="two-col-grid">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="slides[items][{{ $index }}][image]" class="form-input" 
                                   value="{{ $slide['image'] ?? '' }}" placeholder="/images/about.png">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="slides[items][{{ $index }}][button_text]" class="form-input" 
                                   value="{{ $slide['button_text'] ?? '' }}" placeholder="Jetzt kontaktieren">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 1rem; margin-bottom: 0;">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="slides[items][{{ $index }}][button_link]" class="form-input" 
                               value="{{ $slide['button_link'] ?? '' }}" placeholder="#kontakt">
                    </div>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-slide" class="btn btn-secondary">+ {{ __('Add Slide') }}</button>
        @endcomponent
        </div>

        <!-- Stats Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📊 ' . __('Statistics Section')])
            <p style="color: #6b7280; margin-bottom: 1rem;">{{ __('Counter statistics displayed on the homepage') }}</p>
            <div id="stats-container">
                @php $statsItems = $statsSection['items'] ?? []; @endphp
                @foreach($statsItems as $index => $stat)
                <div class="stat-item stats-grid" style="margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon Path</label>
                        <input type="text" name="stats[items][{{ $index }}][icon]" class="form-input" 
                               value="{{ $stat['icon'] ?? '' }}" placeholder="/images/icons/icons1.png">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Value</label>
                        <input type="text" name="stats[items][{{ $index }}][value]" class="form-input" 
                               value="{{ $stat['value'] ?? '' }}" placeholder="400">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Label</label>
                        <input type="text" name="stats[items][{{ $index }}][label]" class="form-input" 
                               value="{{ $stat['label'] ?? '' }}" placeholder="Projektfinanzierungen">
                    </div>
                    <button type="button" class="btn btn-danger remove-stat" style="align-self: end;">×</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-stat" class="btn btn-secondary">+ {{ __('Add Statistic') }}</button>
        @endcomponent
        </div>

        <!-- About Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📖 About Section (Über Niedrigzins24)'])
            <div class="form-group">
                <label class="form-label">Section Title</label>
                <input type="text" name="about[title]" class="form-input" 
                       value="{{ $aboutSection['title'] ?? '' }}" placeholder="Über Niedrigzins24">
            </div>
            <div class="form-group">
                <label class="form-label">Content</label>
                <textarea name="about[content]" class="form-input rich-editor" rows="10" 
                          placeholder="About section content... Use toolbar for paragraphs, lists, bold, links (HTML and plain text allowed)">{{ $aboutSection['content'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Image Path</label>
                <input type="text" name="about[image]" class="form-input" 
                       value="{{ $aboutSection['image'] ?? '' }}" placeholder="/images/slide2.png">
            </div>
        @endcomponent
        </div>

        <!-- FAQ Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '❓ ' . __('FAQ Section')])
            <div id="faq-container">
                @php $faqItems = $faqSection['items'] ?? []; @endphp
                @foreach($faqItems as $index => $faq)
                <div class="faq-item" style="margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group">
                        <label class="form-label">Question</label>
                        <input type="text" name="faq[items][{{ $index }}][question]" class="form-input" 
                               value="{{ $faq['question'] ?? '' }}" placeholder="FAQ Question">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Answer</label>
                        <textarea name="faq[items][{{ $index }}][answer]" class="form-input" rows="3" 
                                  placeholder="FAQ Answer...">{{ $faq['answer'] ?? '' }}</textarea>
                    </div>
                    <button type="button" class="btn btn-danger remove-faq">Remove FAQ</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-faq" class="btn btn-secondary">+ {{ __('Add FAQ') }}</button>
        @endcomponent
        </div>

        <!-- Contact Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📞 ' . __('Contact Section')])
            <div class="form-group">
                <label class="form-label">Section Title</label>
                <input type="text" name="contact[title]" class="form-input" 
                       value="{{ $contactSection['title'] ?? '' }}" placeholder="Kontakt">
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('Google Maps Embed URL') }}</label>
                <input type="url" name="contact[map_embed]" class="form-input" 
                       value="{{ $contactSection['map_embed'] ?? '' }}" placeholder="https://www.google.com/maps/embed?...">
                <small style="color: #6b7280;">Get this URL from Google Maps → Share → Embed a map</small>
            </div>
        @endcomponent
        </div>

        <div style="margin-top: 1.5rem; text-align: right;">
            <button type="submit" class="btn btn-primary" style="padding: 0.75rem 2rem;">
                💾 {{ __('Save All Changes') }}
            </button>
        </div>
    </form>

    <script>
        let slideIndex = {{ count($slideItems ?? []) }};
        let statIndex = {{ count($statsItems ?? []) }};
        let faqIndex = {{ count($faqItems ?? []) }};

        // Add Slide
        document.getElementById('add-slide').addEventListener('click', function() {
            const container = document.getElementById('slides-container');
            const html = `
                <div class="slide-item" style="margin-bottom: 1.5rem; padding: 1.5rem; background: #f9fafb; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <strong style="font-size: 1.1rem;">Slide #${slideIndex + 1}</strong>
                        <button type="button" class="btn btn-danger remove-slide" style="padding: 0.25rem 0.75rem;">Remove</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Slide Title</label>
                        <input type="text" name="slides[items][${slideIndex}][title]" class="form-input" placeholder="Slide headline">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Content</label>
                        <textarea name="slides[items][${slideIndex}][content]" class="form-input rich-editor" rows="6" placeholder="Slide content... (HTML and plain text allowed)"></textarea>
                    </div>
                    <div class="two-col-grid">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="slides[items][${slideIndex}][image]" class="form-input" placeholder="/images/about.png">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="slides[items][${slideIndex}][button_text]" class="form-input" placeholder="Jetzt kontaktieren">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 1rem; margin-bottom: 0;">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="slides[items][${slideIndex}][button_link]" class="form-input" placeholder="#kontakt">
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            slideIndex++;
            const newTextarea = container.querySelector('.slide-item:last-child textarea.rich-editor');
            if (newTextarea && window.initRichEditorFor) window.initRichEditorFor(newTextarea);
        });

        // Add Stat
        document.getElementById('add-stat').addEventListener('click', function() {
            const container = document.getElementById('stats-container');
            const html = `
                <div class="stat-item stats-grid" style="margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon Path</label>
                        <input type="text" name="stats[items][${statIndex}][icon]" class="form-input" placeholder="/images/icons/icons1.png">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Value</label>
                        <input type="text" name="stats[items][${statIndex}][value]" class="form-input" placeholder="400">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Label</label>
                        <input type="text" name="stats[items][${statIndex}][label]" class="form-input" placeholder="Projektfinanzierungen">
                    </div>
                    <button type="button" class="btn btn-danger remove-stat" style="align-self: end;">×</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            statIndex++;
        });

        // Add FAQ
        document.getElementById('add-faq').addEventListener('click', function() {
            const container = document.getElementById('faq-container');
            const html = `
                <div class="faq-item" style="margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group">
                        <label class="form-label">Question</label>
                        <input type="text" name="faq[items][${faqIndex}][question]" class="form-input" placeholder="FAQ Question">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Answer</label>
                        <textarea name="faq[items][${faqIndex}][answer]" class="form-input" rows="3" placeholder="FAQ Answer..."></textarea>
                    </div>
                    <button type="button" class="btn btn-danger remove-faq">Remove FAQ</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            faqIndex++;
        });

        // Remove handlers
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-slide')) {
                e.target.closest('.slide-item').remove();
            }
            if (e.target.classList.contains('remove-stat')) {
                e.target.closest('.stat-item').remove();
            }
            if (e.target.classList.contains('remove-faq')) {
                e.target.closest('.faq-item').remove();
            }
        });
    </script>
@endsection
