@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ __('Dashboard Overview') }}</h1>
    </div>

    <div class="grid-container" style="margin-bottom: 2rem;">
        @include('admin.components.stat-card', [
            'value' => $stats['total_images'] ?? 0,
            'label' => __('Total Uploaded Images'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'value' => $stats['total_videos'] ?? 0,
            'label' => __('Total Uploaded Videos'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'value' => $stats['total_blogs'] ?? 0,
            'label' => __('Total Blog Posts'),
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1m2 13a2 2 0 0 1-2-2V7m2 13a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>'
        ])
        
        @include('admin.components.stat-card', [
             'value' => $stats['new_leads'] ?? 0,
             'label' => __('New Leads'),
             'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>'
        ])
    </div>
    
    <div class="grid-container dashboard-split">
        @component('admin.components.card', ['title' => __('Recent Contact Leads')])
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentLeads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->created_at->diffForHumans() }}</td>
                            <td>
                                @if($lead->status === 'new')
                                    <span style="color: var(--color-success); font-weight: bold;">{{ __('New') }}</span>
                                @elseif($lead->status === 'read')
                                    <span style="color: #3b82f6; font-weight: bold;">{{ __('Read') }}</span>
                                @else
                                    <span style="color: #6b7280;">{{ ucfirst($lead->status) }}</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #6b7280;">{{ __('No leads yet') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($recentLeads->count() > 0)
            <div style="margin-top: 1rem;">
                <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">{{ __('View All Leads') }}</a>
            </div>
            @endif
        @endcomponent
        
        @component('admin.components.card', ['title' => __('Quick Actions')])
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <a href="{{ route('admin.homepage') }}" class="btn btn-primary w-full">
                    <span style="margin-right:0.5rem">✏️</span> {{ __('Edit Homepage') }}
                </a>
                <a href="{{ route('admin.images') }}" class="btn btn-primary w-full">
                    <span style="margin-right:0.5rem">🖼️</span> {{ __('Manage Images') }}
                </a>
                {{-- Blog (commented out)
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary w-full">
                    <span style="margin-right:0.5rem">📝</span> Write New Blog
                </a>
                --}}
                <a href="{{ route('admin.settings') }}" class="btn btn-secondary w-full">⚙️ {{ __('Settings') }}</a>
            </div>
        @endcomponent
    </div>
@endsection
