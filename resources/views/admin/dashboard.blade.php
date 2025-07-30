<x-layouts.app title="Dashboard">

@if(session('success'))
    <div class="mb-4 text-green-600">
        {{ session('success') }}
    </div>
@endif

<!-- Form Input Kunjungan -->
<div class="bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Masukkan Data Kunjungan</h2>

    <form action="{{ route('admin.logbook.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama_pengunjung" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            <input type="text" name="nama_pengunjung" id="nama_pengunjung" placeholder="Masukkan Nama Anda" required
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Role / Asal -->
        <div>
            <label for="asal_pengunjung" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role / Peran</label>
            <input type="text" name="asal_pengunjung" id="asal_pengunjung" placeholder="Jabatan / Instansi / Peran" required
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Keperluan -->
        <div>
            <label for="keperluan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan / Tujuan</label>
            <input type="text" name="keperluan" id="keperluan" placeholder="Masukkan Tujuan Anda" required
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Lokasi Server -->
        <div>
            <label for="lokasi_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi Server</label>
            <select name="lokasi_id" id="lokasi_id" required
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($locations as $lokasi)
                    <option value="{{ $lokasi->lokasi_id }}">{{ $lokasi->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>

        <!-- Device Diakses -->
        <div>
            <label for="device_diakses" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Device Diakses</label>
            <select name="device_diakses[]" id="device_diakses" multiple
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
                @foreach ($devices as $device)
                    <option value="{{ $device->device_id }}">{{ $device->nama_device }}</option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Gunakan Ctrl (Windows) atau Cmd (Mac) untuk memilih lebih dari satu</p>
        </div>


        <!-- Tanggal Kunjungan -->
        <div>
            <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" required
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Waktu Masuk -->
        <div>
            <label for="waktu_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Masuk</label>
            <input type="time" name="waktu_masuk" id="waktu_masuk"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Waktu Keluar -->
        <div>
            <label for="waktu_keluar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Keluar</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
        </div>

        <!-- Tombol Aksi -->
        <div class="col-span-3 flex justify-end gap-3 mt-4">
            <button type="reset"
                class="px-4 py-2 bg-gray-100 dark:bg-zinc-600 text-gray-800 dark:text-white rounded hover:bg-gray-200 dark:hover:bg-zinc-500 transition">
                Clear
            </button>
            <button type="button"
                onclick="window.location.reload()"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                Cancel
            </button>
            <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Submit
            </button>
        </div>
    </form>
</div>

</x-layouts.app>
