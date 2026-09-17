<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ruang::all();

        return view('ruang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|integer',
            'lokasi' => 'required',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer',
        ]);

        Ruang::create([
            'nomor' => $request->nomor,
            'lokasi' => $request->lokasi,
            'lantai' => $request->lantai,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect()->route('ruang.index')
                         ->with('success', 'Data Ruang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        //
    }
}
