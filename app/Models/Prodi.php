<?php

namespace App\Models; // Menyatakan namespace model ini berada di folder App\Models.

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory agar model bisa dibuat factory untuk testing/seeding.
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model dari Eloquent untuk membuat model Laravel.
use App\Models\Dosen; // Mengimpor model Dosen agar bisa digunakan pada relasi kaprodi().

class Prodi extends Model // Mendefinisikan class Prodi yang mewakili tabel prodi di database.
{
    use HasFactory; // Menambahkan fitur factory ke model Prodi.

    protected $fillable = [ // Menentukan kolom yang boleh diisi secara massal.
        'nama', // Kolom nama program studi.
        'jenjang', // Kolom jenjang pendidikan program studi.
        'id_kaprodi', // Kolom foreign key yang menghubungkan ke dosen ketua program studi.
        'id_jurusan', // Kolom foreign key yang menghubungkan ke jurusan.
    ];
    public function jurusan() // Method relasi: satu prodi dimiliki oleh satu jurusan.
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan'); // Menghubungkan ke model Jurusan berdasarkan kolom id_jurusan.
    }
    public function kaprodi() // Method relasi: satu prodi memiliki satu kaprodi (dosen).
    {
        return $this->belongsTo(Dosen::class, 'id_kaprodi'); // Menghubungkan ke model Dosen berdasarkan kolom id_kaprodi.
    }
    public function prodi() // Method relasi: menyatakan bahwa satu prodi memiliki banyak data prodi lain (belum tentu sesuai kebutuhan).
    {
        return $this->hasMany(Matakuliah::class, 'id_prodi'); // Menghubungkan ke model Prodi lain dengan foreign key id_prodi.
    }
}