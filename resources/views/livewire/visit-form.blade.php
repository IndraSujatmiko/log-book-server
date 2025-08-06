<div>
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Waktu Server Saat Ini (now()):</span> {{ now()->toDateTimeString() }} (Timezone: {{ config('app.timezone') }})
    </div>

    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form yang sudah ada -->
    <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <!-- Nama -->
        <div>
            <label for="nama_pengunjung" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            <input type="text" wire:model="nama_pengunjung" id="nama_pengunjung" placeholder="Masukkan Nama Anda"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('nama_pengunjung') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Role / Asal -->
        <div>
            <label for="asal_pengunjung" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role / Peran</label>
            <input type="text" wire:model="asal_pengunjung" id="asal_pengunjung" placeholder="Jabatan / Instansi / Peran"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('asal_pengunjung') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Keperluan -->
        <div>
            <label for="keperluan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan / Tujuan</label>
            <input type="text" wire:model="keperluan" id="keperluan" placeholder="Masukkan Tujuan Anda"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('keperluan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Lokasi Server -->
        <div>
            <label for="lokasi_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi Server</label>
            <select wire:model.live="lokasi_id" id="lokasi_id"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
                <option value="">-- Pilih Lokasi --</option>
                @foreach ($locations as $lokasi)
                    <option value="{{ $lokasi->lokasi_id }}">{{ $lokasi->nama_lokasi }}</option>
                @endforeach
            </select>
            @error('lokasi_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Device Diakses -->
        <div>
            <label for="device_diakses" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Device Diakses</label>
            <select wire:model.live="device_diakses" id="device_diakses" multiple
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
                <option value="">-- Pilih Device --</option>
               @foreach ($devices as $device)
                    <option value="{{ $device->device_id }}">{{ $device->nama_device }}</option>
                @endforeach
            </select>
            @error('device_diakses') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <!-- Tanggal & Waktu -->
        <div>
            <label for="tanggal_kunjungan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kunjungan</label>
            <input type="date" wire:model="tanggal_kunjungan" id="tanggal_kunjungan"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('tanggal_kunjungan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Waktu Masuk -->
        <div>
            <label for="waktu_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Masuk</label>
            <input type="time" wire:model="waktu_masuk" id="waktu_masuk"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('waktu_masuk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Waktu Keluar -->
        <div>
            <label for="waktu_keluar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Keluar</label>
            <input type="time" wire:model="waktu_keluar" id="waktu_keluar"
                class="mt-1 w-full rounded-md border-gray-300 dark:border-zinc-600 px-3 py-2 dark:bg-zinc-700 dark:text-white shadow-sm">
            @error('waktu_keluar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="col-span-3 flex justify-end gap-3 mt-4">
            <button type="button" onclick="window.location.reload()"
                class="px-4 py-2 bg-gray-100 dark:bg-zinc-600 text-gray-800 dark:text-white rounded hover:bg-gray-200 dark:hover:bg-zinc-500 transition">
                Clear
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

    <!-- Daftar Kunjungan -->
    <div class="mt-8">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Daftar Kunjungan</h3>
        
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-zinc-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                <thead class="bg-gray-50 dark:bg-zinc-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Peran</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Waktu Masuk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Waktu Keluar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Lokasi Server</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Keperluan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Device</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-zinc-900 divide-y divide-gray-200 dark:divide-zinc-700">
                    @forelse ($logBooks as $log)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->nama_pengunjung }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $status = '';
                                $statusClass = '';
                                if (now()->between($log->waktu_masuk, $log->waktu_keluar)) {
                                    $status = 'Active';
                                    $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                                } elseif (now()->gt($log->waktu_keluar)) {
                                    $status = 'Completed';
                                    $statusClass = 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200';
                                } else {
                                    $status = 'Disetujui';
                                    $statusClass = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200';
                                }
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->asal_pengunjung }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->tanggal_kunjungan->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->waktu_masuk->format('H:i:s') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->waktu_keluar->format('H:i:s') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $log->location->nama_lokasi }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                            {{ $log->keperluan }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                            <div class="flex flex-wrap gap-1">
                                @foreach($log->deviceAccesses as $access)
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                        {{ $access->device->nama_device }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                            Tidak ada data kunjungan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $logBooks->links() }}
        </div>
    </div>
</div>
