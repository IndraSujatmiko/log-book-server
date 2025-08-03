<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $primaryKey = 'device_id';

    protected $fillable = [
        'nama_device',
        'type',
        'serial_number',
        'description',
    ];

    public function accesses()
    {
        return $this->hasMany(DeviceAccess::class, 'device_id');
    }
}
