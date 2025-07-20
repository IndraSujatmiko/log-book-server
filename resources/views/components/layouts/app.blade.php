<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <x-layouts.app.sidebar :title="$title ?? null" />

    <main class="p-4">
        {{ $slot }}
    </main>

    @fluxScripts
</body>
</html>
