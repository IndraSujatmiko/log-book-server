<x-layouts.app title="Lokasi Server">
    <div class="p-6 bg-white rounded shadow dark:bg-zinc-800">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-zinc-800 dark:text-white">Manajemen Lokasi Server</h1>
            <a href="{{ route('admin.locations.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                + Tambah Lokasi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-zinc-200 dark:border-zinc-700 rounded">
                <thead class="bg-zinc-100 dark:bg-zinc-700 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                    <tr>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">#</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Nama Lokasi</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Gedung</th>
                        <th class="px-4 py-3 border-b text-center dark:border-zinc-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-zinc-800 dark:divide-gray-700">
                    @forelse($locations as $index => $location)
                        <tr>
                            <td class="px-4 py-3">{{ $locations->firstItem() + $index }}</td>
                            <td class="px-4 py-3">{{ $location->nama_lokasi }}</td>
                            <td class="px-4 py-3">{{ $location->gedung }}</td>
                            <td class="px-4 py-3 text-center space-x-3">
                                <a href="{{ route('admin.locations.edit', $location->lokasi_id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.locations.destroy', $location->lokasi_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-zinc-500">Tidak ada data lokasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $locations->links() }}
        </div>
    </div>
</x-layouts.app>
