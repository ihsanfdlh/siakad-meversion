<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')
            ->orderBy('nama')
            ->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::orderBy('nama')->get();

        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('prodi');
        $mahasiswa->load('nilai.matakuliah'); // eager load relasi
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::orderBy('nama')->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
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
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
    public function statistikProdi()
    {
        $rekap = DB::table('mahasiswas')
            ->join('prodis', 'mahasiswas.id_prodi', '=', 'prodis.id')
            ->select(
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
    public function tanpaEagerLoading()
    {
        DB::enableQueryLog();

        $mahasiswa = Mahasiswa::take(5)->get();

        foreach ($mahasiswa as $m) {
            $m->nilai;
        }

        $queries = DB::getQueryLog();

        dd([
            'jumlah_query' => count($queries),
            'query' => $queries,
        ]);
    }
    public function denganEagerLoading()
    {
        DB::enableQueryLog();

        $mahasiswa = Mahasiswa::with('nilai')
            ->take(5)
            ->get();

        foreach ($mahasiswa as $m) {
            $m->nilai;
        }

        $queries = DB::getQueryLog();

        dd([
            'jumlah_query' => count($queries),
            'query' => $queries,
        ]);
    }
}