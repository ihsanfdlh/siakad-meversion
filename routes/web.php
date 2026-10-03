<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SiswaController;
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
Route::resource('/mahasiswa', MahasiswaController::class)->only(['index', 'create', 'store']);

Route::get('/mahasiswa/{mahasiswa}', function (Mahasiswa $mahasiswa) {
    return $mahasiswa->nama; // otomatis mengambil data sesuai id pada URL
});

// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
//     ->name('mahasiswa.index');

// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
//     ->name('mahasiswa.create');

// Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
//     ->name('mahasiswa.store');

//data mata kuliah
Route::resource('/matakuliah', MatakuliahController::class);

// Route::get('/matakuliah', [MatakuliahController::class, 'index'])
//     ->name('matakuliah.index');

// Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])
//     ->name('matakuliah.create');

// Route::post('/matakuliah', [MatakuliahController::class, 'store'])
//     ->name('matakuliah.store');


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

//langkah kerja 1.2
Route::get('/halo', function () {
    return 'Halo, ini adalah route pertama saya!';
});

//tugas mandiri 1.1
Route::get('/profil', function () {
    return 'Halo, Nama saya adalah Ihsan Fadhilah, saya sedang kuliah pada Politeknik Neger Banjarmasin pada Semester 3!';
});
Route::get('/kontak', function () {
    return 'Hubungi saya dengan email ihsan992277@gmail.com';
});
Route::get('/tentang', function () {
    return 'Ini adalah project laravel saya yang saya buat untuk memenuhi tugas mata kuliah Desain Web!';
});

//langkah kerja 2.5
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard Admin';
    })->name('dashboard');
});

//tugas mandiri 2.2
Route::prefix('akademik')->name('akademik.')->group(function () {
    Route::resource('/siswa', SiswaController::class);

    Route::resource('/mapel', MatapelajaranController::class);
});

Route::fallback(function () {
    return 'Halaman yang Anda cari tidak ditemukan.';
});

//langkah kerja 4.2
Route::get('/sapa', function () {
    return view('sapa', [
        'nama' => 'Ihsan Fadhilah',
        'kontenHtml' => '<strong>Teks Tebal</strong>',
    ]);
});

//tugas mandiri 4.1
Route::get('/profil', function () {
    return view('profil')
        ->with('nama', 'Ihsan Fadhilah')
        ->with('nim', 'C030325125')
        ->with('prodi', 'D3 Teknik Informatika');
});

//tugas mandiri 4.2
Route::get('/statistik', function () {
    return view('akademik.statistik');
});

//tugas mandiri 5.2
Route::get('/xss', function () {
    $nama = "<script>alert('XSS')</script>";

    return view('xss', compact('nama'));
});
// Route::get('/mahasiswa/{nim}', function ($nim) {
//     return "Detail mahasiswa dengan NIM: {$nim}";
// });

// Route::get('/artikel/{slug?}', function ($slug = 'default') {
//     return "Slug artikel: {$slug}";
// });

// Route::get('/mahasiswa/{nim}', function ($nim) {
//     return "NIM: {$nim}";
// })->where('nim', '[0-9]+'); // hanya menerima angka
