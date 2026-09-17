<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::all();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        Matakuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }
}