<x-layouts.app :title="'Edit Device'">
    <div class="p-6 bg-white rounded shadow dark:bg-zinc-800 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-zinc-800 dark:text-white">Edit Device</h1>

        <form action="{{ route('admin.devices.update', $device->device_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_device" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Nama Device</label>
                <input type="text" id="nama_device" name="nama_device" value="{{ old('nama_device', $device->nama_device) }}" required
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700">
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Tipe Device</label>
                <input type="text" id="type" name="type" value="{{ old('type', $device->type) }}" required
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700">
            </div>

            <div>
                <label for="serial_number" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Serial Number</label>
                <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number', $device->serial_number) }}" required
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Deskripsi</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full mt-1 px-3 py-2 border rounded dark:bg-zinc-900 dark:text-white dark:border-zinc-700">{{ old('description', $device->description) }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.devices.index') }}"
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
