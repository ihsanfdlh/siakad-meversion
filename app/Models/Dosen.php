<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'no_telp',
        'email',
    ];
    public function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'dosen_id');
    }
    public function jurusans()
    {
        return $this->hasMany(Jurusan::class, 'id_kajur', 'id_sekjur');
    }
}