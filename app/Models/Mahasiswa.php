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
        'no_telp',
        'email',
        'id_prodi',
        'semester',
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}