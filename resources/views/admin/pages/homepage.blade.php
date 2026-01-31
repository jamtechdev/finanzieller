@extends('admin.layouts.app')

@section('title', 'Edit Homepage')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1 class="page-title">Edit Homepage Content</h1>
        <button type="submit" form="homepage-form" class="btn btn-primary">
            <span style="margin-right:0.5rem">💾</span> Save Changes
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
        @component('admin.components.card', ['title' => '🎯 Hero Section'])
            <div class="form-group">
                <label class="form-label">Hero Title</label>
                <input type="text" name="hero[title]" class="form-input" 
                       value="{{ $heroSection['title'] ?? '' }}" placeholder="Main headline...">
            </div>
            <div class="form-group">
                <label class="form-label">Hero Subtitle</label>
                <textarea name="hero[subtitle]" class="form-input" rows="3" 
                          placeholder="Supporting text...">{{ $heroSection['subtitle'] ?? '' }}</textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
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

        <!-- About Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📖 About Section'])
            <div class="form-group">
                <label class="form-label">Section Title</label>
                <input type="text" name="about[title]" class="form-input" 
                       value="{{ $aboutSection['title'] ?? '' }}" placeholder="About Us">
            </div>
            <div class="form-group">
                <label class="form-label">Content</label>
                <textarea name="about[content]" class="form-input rich-editor" rows="6" 
                          placeholder="About section content...">{{ $aboutSection['content'] ?? '' }}</textarea>
            </div>
        @endcomponent
        </div>

        <!-- Stats Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📊 Statistics Section'])
            <p style="color: #6b7280; margin-bottom: 1rem;">Add up to 4 statistics to display</p>
            <div id="stats-container">
                @php $statsItems = $statsSection['items'] ?? []; @endphp
                @foreach($statsItems as $index => $stat)
                <div class="stat-item" style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon Path</label>
                        <input type="text" name="stats[items][{{ $index }}][icon]" class="form-input" 
                               value="{{ $stat['icon'] ?? '' }}" placeholder="images/icons/1.png">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Value</label>
                        <input type="text" name="stats[items][{{ $index }}][value]" class="form-input" 
                               value="{{ $stat['value'] ?? '' }}" placeholder="2,500+">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Label</label>
                        <input type="text" name="stats[items][{{ $index }}][label]" class="form-input" 
                               value="{{ $stat['label'] ?? '' }}" placeholder="Happy Customers">
                    </div>
                    <button type="button" class="btn btn-danger remove-stat" style="align-self: end;">×</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="add-stat" class="btn btn-secondary">+ Add Statistic</button>
        @endcomponent
        </div>

        <!-- FAQ Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '❓ FAQ Section'])
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
            <button type="button" id="add-faq" class="btn btn-secondary">+ Add FAQ</button>
        @endcomponent
        </div>

        <!-- Contact Section -->
        <div style="margin-top: 1.5rem;">
        @component('admin.components.card', ['title' => '📞 Contact Section'])
            <div class="form-group">
                <label class="form-label">Section Title</label>
                <input type="text" name="contact[title]" class="form-input" 
                       value="{{ $contactSection['title'] ?? '' }}" placeholder="Contact Us">
            </div>
            <div class="form-group">
                <label class="form-label">Google Maps Embed URL</label>
                <input type="url" name="contact[map_embed]" class="form-input" 
                       value="{{ $contactSection['map_embed'] ?? '' }}" placeholder="https://www.google.com/maps/embed?...">
            </div>
        @endcomponent
        </div>
    </form>

    <script>
        let statIndex = {{ count($statsItems ?? []) }};
        let faqIndex = {{ count($faqItems ?? []) }};

        document.getElementById('add-stat').addEventListener('click', function() {
            const container = document.getElementById('stats-container');
            const html = `
                <div class="stat-item" style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 0.5rem;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Icon Path</label>
                        <input type="text" name="stats[items][${statIndex}][icon]" class="form-input" placeholder="images/icons/1.png">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Value</label>
                        <input type="text" name="stats[items][${statIndex}][value]" class="form-input" placeholder="2,500+">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Label</label>
                        <input type="text" name="stats[items][${statIndex}][label]" class="form-input" placeholder="Happy Customers">
                    </div>
                    <button type="button" class="btn btn-danger remove-stat" style="align-self: end;">×</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            statIndex++;
        });

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

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-stat')) {
                e.target.closest('.stat-item').remove();
            }
            if (e.target.classList.contains('remove-faq')) {
                e.target.closest('.faq-item').remove();
            }
        });
    </script>
@endsection
