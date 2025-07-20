<x-layouts.app>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Rekap Kunjungan</h1>

        <!-- Tabel Placeholder -->
        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Pengunjung</th>
                        <th class="px-4 py-2 border">Tujuan</th>
                        <th class="px-4 py-2 border">Waktu Masuk</th>
                        <th class="px-4 py-2 border">Waktu Keluar</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Budi Santoso</td>
                        <td class="px-4 py-2 border">Maintenance Server</td>
                        <td class="px-4 py-2 border">08:15</td>
                        <td class="px-4 py-2 border">09:00</td>
                        <td class="px-4 py-2 border text-green-600 font-semibold">Selesai</td>
                    </tr>
                    <!-- Tambahkan data dinamis nantinya -->
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
