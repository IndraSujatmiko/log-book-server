<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'serial_number',
        'description',
    ];

    public function accesses()
    {
        return $this->hasMany(DeviceAccess::class);
    }

}
