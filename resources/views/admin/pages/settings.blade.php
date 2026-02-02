@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Site Settings</h1>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #fef2f2; color: #dc2626; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="two-col-grid">
        <!-- General Settings -->
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @component('admin.components.card', ['title' => '🌐 General Settings'])
                <div class="form-group">
                    <label class="form-label">Site Name</label>
                    <input type="text" name="site_name" class="form-input" value="{{ $settings['site_name'] ?? '' }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Site Logo</label>
                    @if($settings['site_logo'])
                        <div style="margin-bottom: 0.5rem;">
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" style="max-height: 50px;">
                        </div>
                    @endif
                    <input type="file" name="site_logo" class="form-input" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Favicon</label>
                    @if($settings['site_favicon'])
                        <div style="margin-bottom: 0.5rem;">
                            <img src="{{ asset('storage/' . $settings['site_favicon']) }}" style="max-height: 32px;">
                        </div>
                    @endif
                    <input type="file" name="site_favicon" class="form-input" accept="image/*">
                </div>
                
                <button type="submit" class="btn btn-primary">Save General Settings</button>
            @endcomponent
        </form>

        <!-- Contact Settings -->
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @component('admin.components.card', ['title' => '📞 Contact Information'])
                <div class="form-group">
                    <label class="form-label">Contact Email</label>
                    <input type="email" name="contact_email" class="form-input" value="{{ $settings['contact_email'] ?? '' }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-input" value="{{ $settings['contact_phone'] ?? '' }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <textarea name="contact_address" class="form-input" rows="2">{{ $settings['contact_address'] ?? '' }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Save Contact Info</button>
            @endcomponent
        </form>

        <!-- Social Media (dynamic) -->
        <form action="{{ route('admin.settings.update') }}" method="POST" id="social-links-form">
            @csrf
            @component('admin.components.card', ['title' => '📱 Social Media Links'])
                <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">Add, edit or remove social links. They appear in the site footer. Leave URL empty to skip.</p>
                <div id="social-links-container">
                    @foreach($settings['social_links'] ?? [] as $index => $link)
                        <div class="social-link-row" style="display: flex; gap: 0.75rem; align-items: flex-end; margin-bottom: 1rem;">
                            <div class="form-group" style="flex: 0 0 140px;">
                                <label class="form-label">Platform</label>
                                <select name="social_links[{{ $index }}][icon]" class="form-input">
                                    <option value="facebook" {{ ($link['icon'] ?? '') === 'facebook' ? 'selected' : '' }}>Facebook</option>
                                    <option value="instagram" {{ ($link['icon'] ?? '') === 'instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="linkedin" {{ ($link['icon'] ?? '') === 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                    <option value="twitter" {{ ($link['icon'] ?? '') === 'twitter' ? 'selected' : '' }}>Twitter / X</option>
                                    <option value="youtube" {{ ($link['icon'] ?? '') === 'youtube' ? 'selected' : '' }}>YouTube</option>
                                    <option value="tiktok" {{ ($link['icon'] ?? '') === 'tiktok' ? 'selected' : '' }}>TikTok</option>
                                    <option value="link" {{ ($link['icon'] ?? '') === 'link' ? 'selected' : '' }}>Other / Link</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label class="form-label">URL</label>
                                <input type="url" name="social_links[{{ $index }}][url]" class="form-input" value="{{ $link['url'] ?? '' }}" placeholder="https://...">
                            </div>
                            <button type="button" class="btn btn-secondary social-link-remove" style="flex-shrink: 0; margin-bottom: 0.25rem;" title="Remove">✕</button>
                        </div>
                    @endforeach
                </div>
                <div style="margin-top: 1rem;">
                    <button type="button" id="social-link-add" class="btn btn-secondary">+ Add social link</button>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">Save Social Links</button>
            @endcomponent
        </form>

        <script>
            (function() {
                var container = document.getElementById('social-links-container');
                var addBtn = document.getElementById('social-link-add');
                if (!container || !addBtn) return;

                addBtn.addEventListener('click', function() {
                    var rows = container.querySelectorAll('.social-link-row');
                    var index = rows.length;
                    var row = document.createElement('div');
                    row.className = 'social-link-row';
                    row.style.cssText = 'display: flex; gap: 0.75rem; align-items: flex-end; margin-bottom: 1rem;';
                    row.innerHTML =
                        '<div class="form-group" style="flex: 0 0 140px;">' +
                        '<label class="form-label">Platform</label>' +
                        '<select name="social_links[' + index + '][icon]" class="form-input">' +
                        '<option value="facebook">Facebook</option>' +
                        '<option value="instagram">Instagram</option>' +
                        '<option value="linkedin">LinkedIn</option>' +
                        '<option value="twitter">Twitter / X</option>' +
                        '<option value="youtube">YouTube</option>' +
                        '<option value="tiktok">TikTok</option>' +
                        '<option value="link">Other / Link</option>' +
                        '</select></div>' +
                        '<div class="form-group" style="flex: 1;">' +
                        '<label class="form-label">URL</label>' +
                        '<input type="url" name="social_links[' + index + '][url]" class="form-input" placeholder="https://...">' +
                        '</div>' +
                        '<button type="button" class="btn btn-secondary social-link-remove" style="flex-shrink: 0; margin-bottom: 0.25rem;" title="Remove">✕</button>';
                    container.appendChild(row);
                    reindexSocialRows();
                });

                container.addEventListener('click', function(e) {
                    if (e.target.classList.contains('social-link-remove')) {
                        e.target.closest('.social-link-row').remove();
                        reindexSocialRows();
                    }
                });

                function reindexSocialRows() {
                    var rows = container.querySelectorAll('.social-link-row');
                    rows.forEach(function(r, i) {
                        r.querySelectorAll('[name^="social_links"]').forEach(function(el) {
                            el.name = el.name.replace(/social_links\[\d+\]/, 'social_links[' + i + ']');
                        });
                    });
                }
            })();
        </script>

        <!-- Change Password -->
        <form action="{{ route('admin.settings.password') }}" method="POST">
            @csrf
            @component('admin.components.card', ['title' => '🔐 Change Password'])
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-input" required minlength="8">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-input" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Change Password</button>
            @endcomponent
        </form>
    </div>
@endsection
