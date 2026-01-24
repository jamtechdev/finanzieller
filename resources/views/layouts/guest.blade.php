<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-900 selection:bg-indigo-500 selection:text-white">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            
            <!-- Background Decoration -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
                <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-500/10 blur-[120px]"></div>
                <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-purple-500/10 blur-[120px]"></div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 shadow-2xl overflow-hidden sm:rounded-2xl">
                <div class="flex justify-center mb-8">
                    <a href="/">
                        <x-application-logo class="w-16 h-16 fill-current text-indigo-500" />
                    </a>
                </div>
                
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </div>
        </div>
    </body>
</html>
