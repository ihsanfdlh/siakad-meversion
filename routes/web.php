<?php

use App\Models\Mahasiswa;
use App\Models\User;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return 'Hai Ini Home';
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
    ->name('mahasiswa.create');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
    ->name('mahasiswa.store');

Route::get('/dosen', function () {
    $dosen = User::all();
    return view('dosen.index', compact('dosen'));
});

Route::get('/matakuliah', [MatakuliahController::class, 'index'])
    ->name('matakuliah.index');

Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])
    ->name('matakuliah.create');

Route::post('/matakuliah', [MatakuliahController::class, 'store'])
    ->name('matakuliah.store');

Route::get('/dosen', [DosenController::class, 'index'])
    ->name('dosen.index');

Route::get('/dosen/create', [DosenController::class, 'create'])
    ->name('dosen.create');

Route::post('/dosen', [DosenController::class, 'store'])
    ->name('dosen.store');