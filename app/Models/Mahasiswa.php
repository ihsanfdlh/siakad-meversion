<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mahasiswa';

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
    public function prodi(): BelongsTo { return $this->belongsTo( Prodi::class, 'id_prodi', 'id' ); }
    public function nilai(): HasMany { return $this->hasMany( NilaiMatakuliah::class, 'mahasiswa_id', 'id_mahasiswa' ); }
}