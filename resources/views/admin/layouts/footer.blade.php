<footer style="margin-top: 2rem; border-top: 1px solid #e5e7eb; padding-top: 1rem; color: #6b7280; font-size: 0.875rem; text-align: center;">
    &copy; {{ date('Y') }} {{ config('app.name', 'Finanzieller') }} Admin. <a href="{{ route('admin.pages.index') }}" style="color: #6b7280;">Pages</a> &middot; <a href="{{ route('admin.header-footer') }}" style="color: #6b7280;">Header &amp; Footer</a> &middot; <a href="{{ route('admin.settings') }}" style="color: #6b7280;">Settings</a>
</footer>
