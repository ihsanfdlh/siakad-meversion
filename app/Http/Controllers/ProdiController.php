<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::with('jurusan')->get();

        return view('prodi.index', compact('prodis'));
    }
    public function create()
    {
        $jurusan = Jurusan::all();
        $kaprodi = Dosen::all();

        return view('prodi.create', compact('jurusan', 'kaprodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_kaprodi' => 'required|exists:dosens,id',
            'id_jurusan' => 'required|exists:jurusans,id',
        ]);

        Prodi::create([
            'nama' => $request->nama,
            'id_kaprodi' => $request->id_kaprodi,
            'id_jurusan' => $request->id_jurusan,
        ]);

        return redirect()->route('prodi.index')
                         ->with('success', 'Data Program Studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
