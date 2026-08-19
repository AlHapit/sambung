<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <main class="mx-auto flex min-h-screen w-full max-w-md items-center px-6 py-12">
            <div class="w-full rounded-xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>
