<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceAccess;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data device untuk tabel pertama
        $devices = Device::all();

        // Mengambil data akses perangkat beserta relasi ke data device
        $deviceAccesses = DeviceAccess::with('device')->latest()->get();

        // Mengirim kedua data ke view
        return view('admin.devices.index', compact('devices', 'deviceAccesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_device' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:devices,serial_number',
            'description' => 'nullable|string',
        ]);

        // Simpan data ke database
        Device::create($validated);

        // Redirect kembali ke halaman index
        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        return view('admin.devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('admin.devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'nama_device' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:devices,serial_number,' . $device->device_id,
            'description' => 'nullable|string',
        ]);

        $device->update($request->all());

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil dihapus.');
    }
}
