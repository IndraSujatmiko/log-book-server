<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceAccess extends Model
{
    use HasFactory;

    protected $primaryKey = 'access_id';

    protected $fillable = [
        'log_id',
        'nama_perangkat',
        'jenis_perangkat',
        'waktu_akses',
    ];

    // Relasi: akses perangkat dimiliki oleh satu log
    public function logBook()
    {
        return $this->belongsTo(LogBook::class, 'log_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
