<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\QueryBuilderController;
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
Route::resource('/mahasiswa', MahasiswaController::class)->only(['index', 'create', 'store', 'show']);

Route::get('/query-builder', [ QueryBuilderController::class, 'tampilkanSemua' ]);
Route::get('/query-builder/filter', [ QueryBuilderController::class, 'tampilkanFilter' ]);
/* |-------------------------------------------------------------------------- | Statistik |-------------------------------------------------------------------------- */
Route::get('/statistik-prodi', [ QueryBuilderController::class, 'statistikProdi' ]);
/* |-------------------------------------------------------------------------- | INSERT |-------------------------------------------------------------------------- */
Route::get('/mahasiswa2/tambah', [ QueryBuilderController::class, 'formMahasiswa' ]);
Route::post('/mahasiswa2/simpan', [ QueryBuilderController::class, 'simpanMahasiswa' ]);
/* |-------------------------------------------------------------------------- | UPDATE |-------------------------------------------------------------------------- */
Route::get('/mahasiswa2/update/{id}', [ QueryBuilderController::class, 'updateMahasiswa' ]);
/* |-------------------------------------------------------------------------- | DELETE |-------------------------------------------------------------------------- */
Route::get('/mahasiswa2/delete/{id}', [ QueryBuilderController::class, 'deleteMahasiswa' ]);

//data mata kuliah
Route::resource('/matakuliah', MatakuliahController::class);

//data dosen
Route::resource('/dosen', DosenController::class);

//data ruang
Route::resource('/ruang', RuangController::class);

//data prodi
Route::resource('/prodi', ProdiController::class);

//data jurusan
Route::resource('/jurusan', JurusanController::class);

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

//route login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/test-tanpa-eager', [MahasiswaController::class, 'tanpaEagerLoading']);
Route::get('/test-dengan-eager', [MahasiswaController::class, 'denganEagerLoading']);


// Route::get('/mahasiswa/{nim}', function ($nim) {
//     return "Detail mahasiswa dengan NIM: {$nim}";
// });

// Route::get('/artikel/{slug?}', function ($slug = 'default') {
//     return "Slug artikel: {$slug}";
// });

// Route::get('/mahasiswa/{nim}', function ($nim) {
//     return "NIM: {$nim}";
// })->where('nim', '[0-9]+'); // hanya menerima angka
