@extends('layouts.admin')

@section('title', 'Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Card 1 -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:bg-gray-800/70 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-400 text-sm font-medium uppercase tracking-wider">Total Users</h3>
            <div class="p-2 bg-indigo-500/10 rounded-lg text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-white mt-1">{{ $stats['users'] }}</p>
        <div class="mt-4 flex items-center text-sm text-green-400">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            <span>+12% from last month</span>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:bg-gray-800/70 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-400 text-sm font-medium uppercase tracking-wider">Content Blocks</h3>
            <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-white mt-1">{{ $stats['content_blocks'] }}</p>
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span>Last updated just now</span>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:bg-gray-800/70 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-400 text-sm font-medium uppercase tracking-wider">Role</h3>
            <div class="p-2 bg-pink-500/10 rounded-lg text-pink-400 group-hover:bg-pink-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-white mt-1">{{ ucfirst(Auth::user()->role) }}</p>
        <div class="mt-4 flex items-center text-sm text-blue-400">
            <span>Active Session</span>
        </div>
    </div>

    <!-- Stat Card 4 (Placeholder) -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl hover:shadow-2xl hover:bg-gray-800/70 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-400 text-sm font-medium uppercase tracking-wider">System Status</h3>
            <div class="p-2 bg-emerald-500/10 rounded-lg text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-white mt-1">Operational</p>
        <div class="mt-4 flex items-center text-sm text-emerald-400">
            <span>All systems nominal</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Quick Actions -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center">
            <span class="bg-indigo-500 w-2 h-8 rounded-full mr-3"></span>
            Quick Actions
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.page-editor') }}" class="group p-4 border border-gray-700/50 bg-gray-900/50 rounded-xl hover:bg-indigo-600 hover:border-indigo-500 transition-all duration-300 flex items-center">
                <div class="h-12 w-12 rounded-lg bg-indigo-500/20 text-indigo-400 group-hover:bg-white/20 group-hover:text-white flex items-center justify-center mr-4 transition-colors">
                     <span class="text-2xl">📝</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-200 group-hover:text-white">Edit Pages</h4>
                    <p class="text-xs text-gray-500 group-hover:text-indigo-200 mt-1">Update landing content</p>
                </div>
            </a>
            
            <a href="{{ route('profile.edit') }}" class="group p-4 border border-gray-700/50 bg-gray-900/50 rounded-xl hover:bg-purple-600 hover:border-purple-500 transition-all duration-300 flex items-center">
                <div class="h-12 w-12 rounded-lg bg-purple-500/20 text-purple-400 group-hover:bg-white/20 group-hover:text-white flex items-center justify-center mr-4 transition-colors">
                     <span class="text-2xl">👤</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-200 group-hover:text-white">My Profile</h4>
                    <p class="text-xs text-gray-500 group-hover:text-purple-200 mt-1">Manage account</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity (Placeholder) -->
    <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 p-6 rounded-2xl shadow-xl">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center">
            <span class="bg-emerald-500 w-2 h-8 rounded-full mr-3"></span>
            System Activity
        </h3>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="h-2 w-2 mt-2 rounded-full bg-indigo-500 mr-3"></div>
                <div>
                    <p class="text-sm text-gray-300">New user registration <span class="text-gray-500 text-xs ml-2">2 mins ago</span></p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="h-2 w-2 mt-2 rounded-full bg-green-500 mr-3"></div>
                <div>
                    <p class="text-sm text-gray-300">Content block updated <span class="text-gray-500 text-xs ml-2">1 hour ago</span></p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="h-2 w-2 mt-2 rounded-full bg-blue-500 mr-3"></div>
                <div>
                    <p class="text-sm text-gray-300">Backup completed successfully <span class="text-gray-500 text-xs ml-2">3 hours ago</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
