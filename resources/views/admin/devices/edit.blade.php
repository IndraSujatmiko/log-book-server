<x-layouts.app :title="'Edit Device'">
    <h1 class="text-2xl font-bold mb-4">Edit Device</h1>

    <form action="{{ route('admin.devices.update', $device->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Device</label>
            <input type="text" name="name" value="{{ old('name', $device->name) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label>Tipe Device</label>
            <input type="text" name="type" value="{{ old('type', $device->type) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label>Serial Number</label>
            <input type="text" name="serial_number" value="{{ old('serial_number', $device->serial_number) }}" required class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description', $device->description) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
    </form>
</x-layouts.app>
