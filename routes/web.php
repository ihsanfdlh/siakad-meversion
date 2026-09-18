<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuangController;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\Ruang;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', function () {
    $counts = [
        'mahasiswa' => Mahasiswa::count(),
        'dosen' => Dosen::count(),
        'jurusan' => Jurusan::count(),
        'prodi' => Prodi::count(),
        'matakuliah' => Matakuliah::count(),
        'ruang' => Ruang::count(),
    ];

    return view('welcome', compact('counts'));
})->name('welcome');

Route::get('/home', function () {
    return 'Hai Ini Home';
});

//data mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
    ->name('mahasiswa.create');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
    ->name('mahasiswa.store');

//data mata kuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index'])
    ->name('matakuliah.index');

Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])
    ->name('matakuliah.create');

Route::post('/matakuliah', [MatakuliahController::class, 'store'])
    ->name('matakuliah.store');


//data dosen
Route::get('/dosen', [DosenController::class, 'index'])
    ->name('dosen.index');

Route::get('/dosen/create', [DosenController::class, 'create'])
    ->name('dosen.create');

Route::post('/dosen', [DosenController::class, 'store'])
    ->name('dosen.store');


//data ruang
Route::get('/ruang', [RuangController::class, 'index'])
    ->name('ruang.index');

Route::get('/ruang/create', [RuangController::class, 'create'])
    ->name('ruang.create');

Route::post('/ruang', [RuangController::class, 'store'])
    ->name('ruang.store');

//data prodi
Route::get('/prodi', [ProdiController::class, 'index'])
    ->name('prodi.index');

Route::get('/prodi/create', [ProdiController::class, 'create'])
    ->name('prodi.create');

Route::post('/prodi', [ProdiController::class, 'store'])
    ->name('prodi.store');

//data jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

Route::get('/jurusan/create', [JurusanController::class, 'create'])
    ->name('jurusan.create');

Route::post('/jurusan', [JurusanController::class, 'store'])
    ->name('jurusan.store');