<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LogBook;
use Illuminate\Http\Request;
use App\Models\Device;

class LogBookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengunjung'   => 'required|string|max:255',
            'asal_pengunjung'   => 'required|string|max:255',
            'lokasi_id'         => 'required|exists:locations,lokasi_id',
            'tanggal_kunjungan' => 'required|date',
            'keperluan'         => 'required|string|max:255',
            'device_diakses'    => 'required|array',
            'device_diakses.*'  => 'exists:devices,device_id',
            'waktu_masuk'       => 'nullable',
            'waktu_keluar'      => 'nullable',
        ]);

        $validated['input_by'] = auth()->id();

        // Simpan data log book
        $log = LogBook::create($validated);

        // Attach device ke pivot table device_accesses
        foreach ($validated['device_diakses'] as $deviceId) {
            $log->deviceAccesses()->create([
                'device_id' => $deviceId,
                'waktu_akses' => now(),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Data kunjungan berhasil disimpan.');
    }


}
