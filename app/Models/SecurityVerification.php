<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecurityVerification extends Model
{
    use HasFactory;

    protected $primaryKey = 'verification_id';

    protected $fillable = [
        'log_id',
        'user_id',
        'status_verification',
        'catatan',
        'tgl_verification',
    ];

    // Relasi ke log yang diverifikasi
    public function logBook()
    {
        return $this->belongsTo(LogBook::class, 'log_id');
    }

    // Relasi ke user verifikator
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
