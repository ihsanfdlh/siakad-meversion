<?php

namespace App\Http\Controllers; // Menentukan namespace controller untuk aplikasi.

use App\Models\Dosen; // Mengimpor model Dosen untuk mengambil data dosen.
use App\Models\Jurusan; // Mengimpor model Jurusan untuk mengambil data jurusan.
use App\Models\Prodi; // Mengimpor model Prodi untuk mengelola data program studi.
use Illuminate\Http\Request; // Mengimpor class Request untuk menangani input form.

class ProdiController extends Controller // Mendefinisikan controller yang mengelola data program studi.
{
    public function index() // Method untuk menampilkan daftar program studi.
    {
        $prodis = Prodi::with('jurusan')->get(); // Mengambil semua data prodi beserta relasi jurusannya.

        return view('prodi.index', compact('prodis')); // Menampilkan view daftar prodi dan mengirim data prodi.
    }
    public function create() // Method untuk menampilkan form tambah program studi.
    {
        $jurusan = Jurusan::all(); // Mengambil semua data jurusan untuk dropdown.
        $kaprodi = Dosen::all(); // Mengambil semua data dosen untuk dropdown ketua program studi.

        return view('prodi.create', compact('jurusan', 'kaprodi')); // Menampilkan form tambah prodi dengan opsi jurusan dan kaprodi.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Method untuk menyimpan data program studi baru.
    {
        $request->validate([ // Validasi input dari form sebelum disimpan.
            'nama' => 'required', // Nama program studi wajib diisi.
            'jenjang' => 'required', // Jenjang program studi wajib diisi.
            'id_kaprodi' => 'required|exists:dosens,id', // Kaprodi wajib dipilih dan harus ada di tabel dosen.
            'id_jurusan' => 'required|exists:jurusans,id', // Jurusan wajib dipilih dan harus ada di tabel jurusan.
        ]);

        Prodi::create([ // Menyimpan data baru ke tabel prodi.
            'nama' => $request->nama, // Mengisi kolom nama dengan input nama.
            'jenjang' => $request->jenjang, // Mengisi kolom jenjang dengan input jenjang.
            'id_kaprodi' => $request->id_kaprodi, // Mengisi kolom id_kaprodi dengan input kaprodi.
            'id_jurusan' => $request->id_jurusan, // Mengisi kolom id_jurusan dengan input jurusan.
        ]);

        return redirect()->route('prodi.index') // Redirect ke halaman daftar prodi setelah berhasil simpan.
                         ->with('success', 'Data Program Studi berhasil ditambahkan.'); // Menampilkan notifikasi sukses.
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi) // Method untuk menampilkan detail satu program studi.
    {
        // // Placeholder untuk menampilkan data satu prodi. // Menandai bahwa method belum diimplementasikan.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi) // Method untuk menampilkan form edit program studi.
    {
        // // Placeholder untuk menampilkan form edit. // Menandai bahwa method belum diimplementasikan.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi) // Method untuk memperbarui data program studi.
    {
        // // Placeholder untuk proses update data. // Menandai bahwa method belum diimplementasikan.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi) // Method untuk menghapus program studi.
    {
        // // Placeholder untuk proses hapus data. // Menandai bahwa method belum diimplementasikan.
    }
}
