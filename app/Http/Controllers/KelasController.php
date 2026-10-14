<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $kelas=Kelas::with('prodi')->paginate(10);

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi=Prodi::all();
        return view('kelas.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'angkatan' => 'required|integer',
            'semester' => 'required|integer',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'angkatan' => $request->angkatan,
            'semester' => $request->semester,
            'id_prodi' => $request->id_prodi,
        ]);
        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        $kelas->load('mahasiswa');
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        return view('kelas.edit', compact('mahasiswa', 'kelas', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'angkatan' => 'required|integer',
            'semester' => 'required|integer',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'angkatan' => $request->angkatan,
            'semester' => $request->semester,
            'id_prodi' => $request->id_prodi,
        ]);
        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
