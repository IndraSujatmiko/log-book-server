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

        $log = LogBook::create($validated);

        // Simpan ke pivot table
        $log->deviceAccesses()->createMany(
            collect($validated['device_diakses'])->map(fn($id) => ['device_id' => $id])->toArray()
        );

        return redirect()->route('admin.dashboard')->with('success', 'Data kunjungan berhasil disimpan.');
    }

}
