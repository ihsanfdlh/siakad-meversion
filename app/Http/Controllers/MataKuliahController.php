<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::with('dosen')->get();

        return view('matakuliah.index', compact('matakuliahs'));
    }


    public function create()
    {
        $dosen = Dosen::all();

        return view('matakuliah.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Matakuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'dosen_id' => $request->dosen_id,
        ]);

        return redirect()->route('matakuliah.index');
    }
}