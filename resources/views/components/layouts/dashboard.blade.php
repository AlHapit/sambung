<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full bg-slate-50 font-['Inter'] text-slate-900 antialiased">
        <div class="flex min-h-screen">
            {{-- Left fixed sidebar --}}
            <x-dashboard.sidebar />

            {{-- Main view column --}}
            <div class="flex flex-1 flex-col overflow-x-hidden">
                <x-dashboard.navbar />

                <main class="flex-1 px-8 py-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
