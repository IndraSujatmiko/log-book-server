<x-layouts.app title="Administrasi Kunjungan">
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="space-y-12">
        <!-- Section: Pengajuan Kunjungan -->
        <div class="p-6 bg-white rounded shadow dark:bg-zinc-800">
            <h2 class="text-xl font-semibold mb-6 text-zinc-800 dark:text-white">Pengajuan Kunjungan</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-zinc-200 dark:border-zinc-700">
                    <thead class="bg-zinc-100 dark:bg-zinc-700 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        <tr>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Keperluan</th>
                            <th class="px-4 py-3">Peran</th>
                            <th class="px-4 py-3">Waktu</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-zinc-800 dark:divide-gray-700">
                        @forelse ($pendingVisits as $visit)
                            <tr>
                                <td class="px-4 py-3 align-top">{{ $visit->nama_pengunjung }}</td>
                                <td class="px-4 py-3 align-top">{{ Str::limit($visit->keperluan, 30) }}</td>
                                <td class="px-4 py-3 align-top">{{ $visit->asal_pengunjung }}</td>
                                <td class="px-4 py-3 align-top">{{ $visit->waktu_masuk->format('H:i') }} - {{ $visit->waktu_keluar->format('H:i') }}</td>
                                <td class="px-4 py-3 align-top">{{ $visit->tanggal_kunjungan->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('admin.administration.status.update', $visit->log_id) }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="status" value="">
                                        <input type="text" name="catatan" placeholder="Catatan (opsional)" class="w-full sm:w-auto text-sm border-gray-300 dark:border-zinc-600 rounded-md dark:bg-zinc-700 dark:text-white flex-grow">
                                        <div class="flex gap-2">
                                            <button type="submit" onclick="this.form.status.value='disetujui'" class="px-3 py-1 text-sm text-white bg-green-600 rounded hover:bg-green-700 whitespace-nowrap">Setujui</button>
                                            <button type="submit" onclick="this.form.status.value='ditolak'" class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700 whitespace-nowrap">Tolak</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-zinc-500">Tidak ada pengajuan kunjungan baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $pendingVisits->withQueryString()->links() }}
            </div>
        </div>

        <!-- Section: Riwayat Verifikasi (Update Status) -->
        <div class="p-6 bg-white rounded shadow dark:bg-zinc-800">
            <h2 class="text-xl font-semibold mb-6 text-zinc-800 dark:text-white">Riwayat Verifikasi Kunjungan</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-zinc-200 dark:border-zinc-700">
                    <thead class="bg-zinc-100 dark:bg-zinc-700 text-left text-sm font-semibold text-zinc-700 dark:text-zinc-200">
                        <tr>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Keperluan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Catatan</th>
                            <th class="px-4 py-3">Diverifikasi oleh</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-zinc-800 dark:divide-gray-700">
                        @forelse ($processedVisits as $visit)
                            <tr>
                                <td class="px-4 py-3">{{ $visit->nama_pengunjung }}</td>
                                <td class="px-4 py-3">{{ Str::limit($visit->keperluan, 30) }}</td>
                                <td class="px-4 py-3">{{ $visit->tanggal_kunjungan->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $visit->verification->status_verification == 'disetujui' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        {{ $visit->verification->status_verification }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $visit->verification->catatan ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $visit->verification->user->name ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-zinc-500">Belum ada riwayat verifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             <div class="mt-4">
                {{ $processedVisits->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
