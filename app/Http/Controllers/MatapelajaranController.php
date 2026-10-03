<?php

namespace App\Http\Controllers;

use App\Models\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Matapelajaran::All();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'semester' => 'required|integer',
        ]);

        Matapelajaran::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
        ]);

        return redirect()->route('mapel.index')
                         ->with('success', 'Data Mata Pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matapelajaran $mapel)
    {
        return view('mapel.show', compact('mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matapelajaran $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matapelajaran $mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matapelajaran $mapel)
    {
        //
    }
}
