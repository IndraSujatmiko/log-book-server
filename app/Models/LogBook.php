<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogBook extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'nama_pengunjung',
        'asal_pengunjung',
        'input_by',
        'lokasi_id',
        'tanggal_kunjungan',
        'keperluan',
        'waktu_masuk',
        'waktu_keluar', // Tambahan!
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'waktu_masuk' => 'datetime',
        'waktu_keluar' => 'datetime',
    ];

    // Relasi ke user yang menginput log (admin/petugas)
    public function inputBy()
    {
        return $this->belongsTo(User::class, 'input_by');
    }

    // Relasi ke lokasi ruang server
    public function location()
    {
        return $this->belongsTo(Location::class, 'lokasi_id');
    }

    // Relasi ke device yang diakses dalam kunjungan ini
    public function deviceAccesses()
    {
        return $this->hasMany(DeviceAccess::class, 'log_id');
    }

    // Relasi ke verifikasi keamanan
    public function verification()
    {
        return $this->hasOne(SecurityVerification::class, 'log_id');
    }
}
