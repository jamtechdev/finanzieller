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

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
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
                
                <div class="form-group">
                    <label class="form-label">Footer Text</label>
                    <textarea name="footer_text" class="form-input" rows="2">{{ $settings['footer_text'] ?? '' }}</textarea>
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

        <!-- Social Media -->
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @component('admin.components.card', ['title' => '📱 Social Media Links'])
                <div class="form-group">
                    <label class="form-label">Facebook URL</label>
                    <input type="url" name="social_facebook" class="form-input" 
                           value="{{ $settings['social_facebook'] ?? '' }}" placeholder="https://facebook.com/...">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Instagram URL</label>
                    <input type="url" name="social_instagram" class="form-input" 
                           value="{{ $settings['social_instagram'] ?? '' }}" placeholder="https://instagram.com/...">
                </div>
                
                <div class="form-group">
                    <label class="form-label">LinkedIn URL</label>
                    <input type="url" name="social_linkedin" class="form-input" 
                           value="{{ $settings['social_linkedin'] ?? '' }}" placeholder="https://linkedin.com/...">
                </div>
                
                <button type="submit" class="btn btn-primary">Save Social Links</button>
            @endcomponent
        </form>

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
