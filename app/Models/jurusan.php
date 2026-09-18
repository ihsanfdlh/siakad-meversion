<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_kajur',
        'id_sekjur',
    ];
    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'id_jurusan');
    }
    public function kajur()
    {
        return $this->belongsTo(Dosen::class, 'id_kajur');
    }
    public function sekjur()
    {
        return $this->belongsTo(Dosen::class, 'id_sekjur');
    }
}