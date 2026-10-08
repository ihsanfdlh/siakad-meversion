<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | READ - Menampilkan semua mahasiswa
    |--------------------------------------------------------------------------
    */
    public function tampilkanSemua()
    {
        $data = DB::table('mahasiswas')
            ->get();

        return view('demo.query-builder', compact('data'));
    }


    /*
    |--------------------------------------------------------------------------
    | READ - Filter mahasiswa semester >= 3
    |--------------------------------------------------------------------------
    */
    public function tampilkanFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('semester', '>=', 3)
            ->orderBy('nama')
            ->get();

        return view('demo.query-builder', compact('data'));
    }


    /*
    |--------------------------------------------------------------------------
    | AGREGASI - Statistik mahasiswa berdasarkan prodi
    |--------------------------------------------------------------------------
    */
    public function statistikProdi()
    {
        $rekap = DB::table('mahasiswas')
            ->join(
                'prodis',
                'mahasiswas.id_prodi',
                '=',
                'prodis.id'
            )
            ->select(
                'prodis.id',
                'prodis.nama',
                'prodis.jenjang',
                DB::raw('COUNT(mahasiswas.id_mahasiswa) as jumlah')
            )
            ->groupBy(
                'prodis.id',
                'prodis.nama',
                'prodis.jenjang'
            )
            ->orderBy('prodis.nama')
            ->get();

        return view('demo.statistik-prodi', compact('rekap'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE - Menampilkan form mahasiswa
    |--------------------------------------------------------------------------
    */
    public function formMahasiswa()
    {
        $prodis = DB::table('prodis')
            ->orderBy('nama')
            ->get();

        return view('demo.form-mahasiswa', compact('prodis'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE - Menyimpan mahasiswa
    |--------------------------------------------------------------------------
    */
    public function simpanMahasiswa(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'angkatan' => 'required|integer',
            'semester' => 'required|integer',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        DB::table('mahasiswas')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'angkatan' => $request->angkatan,
            'semester' => $request->semester,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect('/query-builder')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE - Mengubah mahasiswa
    |--------------------------------------------------------------------------
    */
    public function updateMahasiswa($id)
    {
        $mahasiswa = DB::table('mahasiswas')
            ->where('id_mahasiswa', $id)
            ->first();

        if (!$mahasiswa) {
            return redirect('/query-builder')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        DB::table('mahasiswas')
            ->where('id_mahasiswa', $id)
            ->update([
                'nama' => 'Mahasiswa Update',
                'semester' => 4,
            ]);

        return redirect('/query-builder')
            ->with('success', 'Data mahasiswa berhasil diubah.');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE - Menghapus mahasiswa
    |--------------------------------------------------------------------------
    */
    public function deleteMahasiswa($id)
    {
        $mahasiswa = DB::table('mahasiswas')
            ->where('id_mahasiswa', $id)
            ->first();

        if (!$mahasiswa) {
            return redirect('/query-builder')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        DB::table('mahasiswas')
            ->where('id_mahasiswa', $id)
            ->delete();

        return redirect('/query-builder')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}