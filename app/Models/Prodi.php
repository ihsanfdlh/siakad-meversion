<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_kaprodi',
        'id_jurusan',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
    public function kaprodi()
    {
        return $this->belongsTo(Dosen::class, 'id_kaprodi');
    }
    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_prodi');
    }
}