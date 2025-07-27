<x-layouts.app title="List Devices">
    <div class="p-6 bg-white rounded shadow dark:bg-zinc-800">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">List Devices</h1>
            <a href="{{ route('admin.devices.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                + Tambah Device
            </a>
        </div>

        <table class="min-w-full border border-zinc-200 dark:border-zinc-700 rounded overflow-hidden">
            <thead class="bg-zinc-100 dark:bg-zinc-700 text-left">
                <tr>
                    <th class="px-4 py-2 border-b dark:border-zinc-600">#</th>
                    <th class="px-4 py-2 border-b dark:border-zinc-600">Nama Device</th>
                    <th class="px-4 py-2 border-b dark:border-zinc-600">Tipe Device</th>
                    <th class="px-4 py-2 border-b dark:border-zinc-600">Serial Number</th>
                    <th class="px-4 py-2 border-b dark:border-zinc-600">Deskripsi</th>
                    <th class="px-4 py-2 border-b dark:border-zinc-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($devices as $index => $device)
                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                        <td class="px-4 py-2 border-b dark:border-zinc-600">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b dark:border-zinc-600">{{ $device->name }}</td>
                        <td class="px-4 py-2 border-b dark:border-zinc-600">{{ $device->type }}</td>
                        <td class="px-4 py-2 border-b dark:border-zinc-600">{{ $device->serial_number }}</td>
                        <td class="px-4 py-2 border-b dark:border-zinc-600">{{ $device->description }}</td>
                        <td class="px-4 py-2 border-b text-center dark:border-zinc-600 space-x-2">
                            <a href="{{ route('admin.devices.edit', $device->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-zinc-500">Tidak ada data perangkat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
