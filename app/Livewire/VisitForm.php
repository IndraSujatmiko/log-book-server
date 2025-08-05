<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Location;
use App\Models\Device;
use App\Models\LogBook;
use Carbon\Carbon;

class VisitForm extends Component
{
    use WithPagination;

    public $nama_pengunjung;
    public $asal_pengunjung;
    public $keperluan;
    public $lokasi_id;
    public $device_diakses = [];
    public $tanggal_kunjungan;
    public $waktu_masuk;
    public $waktu_keluar;

    protected $rules = [
        'nama_pengunjung' => 'required|string|max:255',
        'asal_pengunjung' => 'required|string|max:255',
        'keperluan' => 'required|string',
        'lokasi_id' => 'required|exists:locations,lokasi_id',
        'device_diakses' => 'sometimes|required|array|min:1',
        'device_diakses.*' => 'exists:devices,device_id',
        'tanggal_kunjungan' => 'required|date',
        'waktu_masuk' => 'required',
        'waktu_keluar' => 'required'
    ];

    public function mount()
    {
        $this->tanggal_kunjungan = date('Y-m-d');
        $this->waktu_masuk = date('H:i');
        $this->waktu_keluar = date('H:i', strtotime('+1 hour'));
    }

    public function submit()
    {
        // Tambahkan debugging sebelum validasi
        \Log::info('Form Data:', [
            'lokasi_id' => $this->lokasi_id,
            'device_diakses' => $this->device_diakses
        ]);

        $this->validate();

        // Validasi waktu keluar harus setelah waktu masuk
        $waktuMasuk = Carbon::parse($this->tanggal_kunjungan . ' ' . $this->waktu_masuk);
        $waktuKeluar = Carbon::parse($this->tanggal_kunjungan . ' ' . $this->waktu_keluar);

        if ($waktuKeluar->lte($waktuMasuk)) {
            $this->addError('waktu_keluar', 'Waktu keluar harus setelah waktu masuk');
            return;
        }

        try {
            $logBook = LogBook::create([
                'nama_pengunjung' => $this->nama_pengunjung,
                'asal_pengunjung' => $this->asal_pengunjung,
                'keperluan' => $this->keperluan,
                'lokasi_id' => $this->lokasi_id,
                'tanggal_kunjungan' => $this->tanggal_kunjungan,
                'waktu_masuk' => $waktuMasuk,
                'waktu_keluar' => $waktuKeluar,
                'input_by' => auth()->id(),
            ]);

            // Attach devices
            foreach ($this->device_diakses as $deviceId) {
                $logBook->deviceAccesses()->create([
                    'device_id' => $deviceId,
                    'waktu_akses' => now(),
                ]);
            }

            $this->reset(['nama_pengunjung', 'asal_pengunjung', 'keperluan', 'device_diakses', 'lokasi_id']);
            $this->mount();

            session()->flash('success', 'Data kunjungan berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updatedLokasi($value)
    {
        \Log::info('Lokasi updated:', ['value' => $value]);
    }

    public function updatedDeviceDiakses($value)
    {
        \Log::info('Device updated:', ['value' => $value]);
    }

    public function render()
    {
        return view('livewire.visit-form', [
            'locations' => Location::all(),
            'devices' => Device::all(),
            // Hanya tampilkan logbook yang sudah disetujui
            'logBooks' => LogBook::with(['location', 'deviceAccesses.device', 'inputBy', 'verification'])
                ->whereHas('verification', function ($query) {
                    $query->where('status_verification', 'disetujui');
                })
                ->orderBy('tanggal_kunjungan', 'desc')
                ->orderBy('waktu_masuk', 'desc')
                ->paginate(10),
        ]);
    }
}
