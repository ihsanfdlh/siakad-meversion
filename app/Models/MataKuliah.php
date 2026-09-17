<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'dosen_id',
    ];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}