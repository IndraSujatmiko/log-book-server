<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'lokasi_id';

    protected $fillable = [
        'nama_lokasi',
        'gedung',
    ];

    // Relasi: satu lokasi memiliki banyak log book
    public function logBooks()
    {
        return $this->hasMany(LogBook::class, 'lokasi_id');
    }
}
