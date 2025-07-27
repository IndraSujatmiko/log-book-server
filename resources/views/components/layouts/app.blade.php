<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Sidebar -->
        <x-layouts.app.sidebar :role="auth()->user()->role" :title="$title ?? null" />

        <!-- Main Content -->
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
    </div>

    @fluxScripts
</body>
</html>
