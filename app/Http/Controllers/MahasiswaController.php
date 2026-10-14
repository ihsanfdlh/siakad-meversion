<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi', 'kelas')
            ->orderBy('nama')
            ->paginate(25);

        return view('mahasiswa.index', compact('mahasiswa'));
    }
    public function create()
    {
        $prodi = Prodi::get();
        $kelas = Kelas::get();
        return view('mahasiswa.create', compact('prodi', 'kelas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'angkatan' => 'required|integer',
            'semester' => 'required|integer',
            'id_prodi' => 'required|exists:prodis,id',
            'id_kelas' => 'required|exists:kelas,id_kelas',
        ]);

        Mahasiswa::create([
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
            'id_kelas' => $request->id_kelas,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('prodi');
        $mahasiswa->load('nilai.matakuliah'); // eager load relasi
        return view('mahasiswa.show', compact('mahasiswa'));
    }
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        $kelas = Kelas::get();
        return view('mahasiswa.edit', compact('mahasiswa','prodi', 'kelas'));
    }
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'angkatan' => 'required|integer',
            'semester' => 'required|integer',
            'id_prodi' => 'required|exists:prodis,id',
            'id_kelas' => 'required|exists:kelas,id_kelas',
        ]);

        $mahasiswa->update([
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
            'id_kelas' => $request->id_kelas,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }


    public function tanpaEagerLoading()
    {
        DB::enableQueryLog();
        DB::flushQueryLog();

        $mahasiswa = Mahasiswa::take(10)->get();

        foreach ($mahasiswa as $m) {
            $m->nilai;
        }

        $queries = DB::getQueryLog();

        dd([
            'metode' => 'Tanpa Eager Loading',
            'jumlah_query' => count($queries),
            'query' => $queries,
        ]);
    }
    public function denganEagerLoading()
    {
        DB::enableQueryLog();
        DB::flushQueryLog();

        $mahasiswa = Mahasiswa::with('nilai')
            ->take(10)
            ->get();

        foreach ($mahasiswa as $m) {
            $m->nilai;
        }

        $queries = DB::getQueryLog();

        dd([
            'metode' => 'Dengan Eager Loading',
            'jumlah_query' => count($queries),
            'query' => $queries,
        ]);
    }
}