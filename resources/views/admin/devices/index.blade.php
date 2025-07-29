<x-layouts.app title="List Devices">
    <!-- Section: List Devices -->
    <div class="p-6 bg-white rounded shadow dark:bg-zinc-800">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-zinc-800 dark:text-white">List Devices</h1>
            <a href="{{ route('admin.devices.create') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                + Tambah Device
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-zinc-200 dark:border-zinc-700 rounded">
                <thead class="bg-zinc-100 dark:bg-zinc-700 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                    <tr>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">#</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Nama Device</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Tipe Device</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Serial Number</th>
                        <th class="px-4 py-3 border-b dark:border-zinc-600">Deskripsi</th>
                        <th class="px-4 py-3 border-b text-center dark:border-zinc-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-zinc-800 dark:text-zinc-100 divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse($devices as $index => $device)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $device->name }}</td>
                            <td class="px-4 py-3">{{ $device->type }}</td>
                            <td class="px-4 py-3">{{ $device->serial_number }}</td>
                            <td class="px-4 py-3">{{ $device->description }}</td>
                            <td class="px-4 py-3 text-center space-x-3">
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
    </div>

    <!-- Section: Device Diakses -->
    <div class="mt-12 p-6 bg-white rounded shadow dark:bg-zinc-800">
        <h2 class="text-xl font-semibold mb-6 text-zinc-800 dark:text-white">Device Diakses</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-zinc-200 dark:border-zinc-700">
                <thead class="bg-zinc-100 dark:bg-zinc-700 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Perangkat</th>
                        <th class="px-4 py-3">Jenis Perangkat</th>
                        <th class="px-4 py-3">Waktu Akses</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-zinc-800 dark:text-zinc-100 divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($deviceAccesses as $access)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $access->device->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $access->device->type ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $access->waktu_akses }}</td>
                            <td class="px-4 py-3">
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-zinc-500">Belum ada data akses perangkat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
