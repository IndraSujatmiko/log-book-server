<x-layouts.app title="Edit Lokasi Server">
    <div class="p-6 bg-white rounded shadow dark:bg-zinc-800 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-zinc-800 dark:text-white">Edit Lokasi Server</h1>

        <form action="{{ route('admin.locations.update', $location->lokasi_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_lokasi" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Nama Lokasi</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" value="{{ old('nama_lokasi', $location->nama_lokasi) }}" required
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700" placeholder="e.g., Ruang Server Utama">
            </div>

            <div>
                <label for="gedung" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Gedung</label>
                <input type="text" id="gedung" name="gedung" value="{{ old('gedung', $location->gedung) }}" required
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700" placeholder="e.g., Gedung A Lantai 3">
            </div>

            <div class="flex justify-end pt-4">
                <a href="{{ route('admin.locations.index') }}"
                   class="px-4 py-2 text-sm bg-zinc-300 rounded hover:bg-zinc-400 dark:bg-zinc-700 dark:text-white dark:hover:bg-zinc-600 mr-2">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
