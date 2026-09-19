<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_telp',
        'email',
        'angkatan',
        'semester',
        'id_prodi',
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}