<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogBook extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'user_id',
        'lokasi_id',
        'tanggal_kunjungan',
        'keperluan',
    ];

    // Relasi ke User (yang membuat log)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Lokasi (ruang server)
    public function location()
    {
        return $this->belongsTo(Location::class, 'lokasi_id');
    }

    // Relasi ke Device Access (perangkat yang diakses)
    public function deviceAccesses()
    {
        return $this->hasMany(DeviceAccess::class, 'log_id');
    }

    // Relasi ke Security Verification
    public function verification()
    {
        return $this->hasOne(SecurityVerification::class, 'log_id');
    }
}
