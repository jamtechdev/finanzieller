@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard Overview</h1>
    </div>

    <div class="grid-container" style="margin-bottom: 2rem;">
        @include('admin.components.stat-card', [
            'value' => '12,450',
            'label' => 'Total Website Visitors',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'value' => '245',
            'label' => 'Total Uploaded Images',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'value' => '42',
            'label' => 'Total Uploaded Videos',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>'
        ])
        
        @include('admin.components.stat-card', [
             'value' => '12',
             'label' => 'New Leads',
             'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>'
        ])
    </div>
    
    <div class="grid-container" style="grid-template-columns: 2fr 1fr;">
        @component('admin.components.card', ['title' => 'Recent Content Updates'])
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Page/Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Homepage Banner</td>
                            <td>Image</td>
                            <td>5 mins ago</td>
                            <td><span style="color: var(--color-success); font-weight: bold;">Published</span></td>
                        </tr>
                        <tr>
                            <td>About Us - Story</td>
                            <td>Text</td>
                            <td>2 hours ago</td>
                            <td><span style="color: var(--color-success); font-weight: bold;">Published</span></td>
                        </tr>
                        <tr>
                            <td>New Product Launch Video</td>
                            <td>Video</td>
                            <td>Yesterday</td>
                            <td><span style="color: #f59e0b; font-weight: bold;">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endcomponent
        
        @component('admin.components.card', ['title' => 'Quick Actions'])
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <button class="btn btn-primary w-full">
                    <span style="margin-right:0.5rem">+</span> Upload New Image
                </button>
                 <button class="btn btn-primary w-full">
                    <span style="margin-right:0.5rem">+</span> Write New Blog Post
                </button>
                <button class="btn btn-secondary w-full">Manage Users</button>
            </div>
        @endcomponent
    </div>
@endsection
