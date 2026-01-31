<header class="admin-navbar">
    <div class="navbar-search">
        <div style="position: relative;">
            <input type="text" placeholder="Search..." class="form-input" style="padding-left: 2.5rem; background-color: #f9fafb;">
            <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #9ca3af;">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
        </div>
    </div>
    
    <div class="navbar-actions">
        <!-- New Leads Notification -->
        @php $newLeadsCount = \App\Models\Lead::new()->count(); @endphp
        <a href="{{ route('admin.leads.index', ['status' => 'new']) }}" title="New Leads" 
           style="position: relative; background:none; border:none; cursor:pointer; padding:0.5rem; color:#6b7280; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            @if($newLeadsCount > 0)
                <span style="position: absolute; top: 0; right: 0; background: #ef4444; color: white; font-size: 0.625rem; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    {{ $newLeadsCount > 9 ? '9+' : $newLeadsCount }}
                </span>
            @endif
        </a>
        
        <div class="user-profile" style="position: relative;">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=00473d&color=fff" alt="Admin" class="user-avatar">
            <span style="font-weight: 500; font-size: 0.875rem;">{{ Auth::user()->name ?? 'Admin' }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </div>
    </div>
</header>
