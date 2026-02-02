@extends('admin.layouts.app')

@section('title', 'Header & Footer')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Header & Footer</h1>
        <p style="color: #6b7280; margin-top: 0.25rem;">Manage site navigation menu and footer content. Changes appear on the public website.</p>
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

    <div style="display: grid; gap: 1.5rem; max-width: 800px;">
        <!-- Header Menu -->
        <form action="{{ route('admin.header-footer.update') }}" method="POST">
            @csrf
            @component('admin.components.card', ['title' => '📋 Header navigation (menu items)'])
                <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">These links appear in the main site header. One item per line: <code>Label|URL</code> (e.g. Startseite|/ or Kontakt|#kontakt)</p>
                <div class="form-group">
                    <label class="form-label">Menu items (one per line: Label|URL)</label>
                    <textarea name="header_menu_items" class="form-input" rows="6" placeholder="Startseite|/
Über uns|#Überuns
Kontakt|#kontakt">{{ $headerMenuText }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save header menu</button>
            @endcomponent
        </form>

        <!-- Footer -->
        <form action="{{ route('admin.header-footer.update') }}" method="POST">
            @csrf
            @component('admin.components.card', ['title' => '🦶 Footer content'])
                <div class="form-group">
                    <label class="form-label">Footer brand name</label>
                    <input type="text" name="footer_brand" class="form-input" value="{{ $footer_brand ?? '' }}" placeholder="Niedrigzins24">
                </div>
                <div class="form-group">
                    <label class="form-label">Copyright text (bottom bar)</label>
                    <input type="text" name="footer_copyright" class="form-input" value="{{ $footer_copyright ?? '' }}" placeholder="©Urheberrecht. Alle Rechte vorbehalten.">
                </div>
                <button type="submit" class="btn btn-primary">Save footer</button>
            @endcomponent
        </form>
    </div>
@endsection
