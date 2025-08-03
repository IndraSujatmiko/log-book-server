<x-layouts.app title="Dashboard">
    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Input Kunjungan -->
    <div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Masukkan Data Kunjungan</h2>
        
        <livewire:visit-form />
    </div>
</x-layouts.app>
