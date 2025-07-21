<x-layouts.app :title="'Rekap Kunjungan'">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Rekap Kunjungan</h1>

        <div class="overflow-x-auto bg-white dark:bg-zinc-800 rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-zinc-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Instansi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keperluan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-zinc-800 dark:divide-gray-700">
                    <tr>
                        <td class="px-4 py-3">2025-07-19</td>
                        <td class="px-4 py-3">Budi Santoso</td>
                        <td class="px-4 py-3">PT ABC</td>
                        <td class="px-4 py-3">Maintenance Server</td>
                        <td class="px-4 py-3">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disetujui</span>
                        </td>
                    </tr>
                    <!-- Tambah data lainnya -->
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
