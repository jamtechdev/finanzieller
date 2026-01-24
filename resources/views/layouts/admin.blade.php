<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100 selection:bg-indigo-500 selection:text-white">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'w-64' : 'w-20'" 
            class="bg-gray-800/50 backdrop-blur-xl border-r border-gray-700 transition-all duration-300 flex flex-col fixed h-full z-20"
        >
            <div class="h-16 flex items-center justify-between px-4 border-b border-gray-700/50">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <x-application-logo class="h-8 w-8 text-indigo-500 fill-current flex-shrink-0" />
                    <span x-show="sidebarOpen" class="text-lg font-bold text-white whitespace-nowrap transition-opacity duration-300">Admin</span>
                </div>
                <button @click="sidebarOpen = !sidebarOpen" class="p-1.5 rounded-lg hover:bg-gray-700/50 text-gray-400 hover:text-white transition-colors">
                    <template x-if="sidebarOpen">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" /></svg>
                    </template>
                    <template x-if="!sidebarOpen">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </template>
                </button>
            </div>

            <nav class="flex-1 mt-6 px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-3 py-2.5 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <span class="text-xl group-hover:scale-110 transition-transform duration-200">🏠</span>
                    <span x-show="sidebarOpen" class="ml-3 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.page-editor') }}" class="group flex items-center px-3 py-2.5 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.page-editor') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <span class="text-xl group-hover:scale-110 transition-transform duration-200">📝</span>
                    <span x-show="sidebarOpen" class="ml-3 font-medium">Page Editor</span>
                </a>
                <a href="{{ route('admin.field-editor', 'home') }}" class="group flex items-center px-3 py-2.5 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.field-editor') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <span class="text-xl group-hover:scale-110 transition-transform duration-200">⚙️</span>
                    <span x-show="sidebarOpen" class="ml-3 font-medium">Field Editor</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-700/50">
                <a href="{{ route('home') }}" class="flex items-center px-3 py-2 text-gray-400 hover:text-white hover:bg-gray-700/50 rounded-lg transition-all duration-200">
                    <span class="text-xl">🌐</span>
                    <span x-show="sidebarOpen" class="ml-3 font-medium">View Site</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen transition-all duration-300" :class="sidebarOpen ? 'pl-64' : 'pl-20'">
            <header class="h-16 bg-gray-900/80 backdrop-blur-md border-b border-gray-700 sticky top-0 z-10 flex items-center justify-between px-6">
                <h2 class="text-xl font-bold text-white tracking-tight">@yield('title', 'Admin Panel')</h2>
                
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-xs font-bold text-white shadow-lg shadow-indigo-500/20">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-sm font-medium text-gray-300">{{ Auth::user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-400 hover:text-red-400 transition-colors">Logout</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6 sm:p-8">
                @if(session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-500/10 border border-green-500/20 text-green-400 rounded-lg flex items-center shadow-lg shadow-green-500/10">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="animate-fade-in-up">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
