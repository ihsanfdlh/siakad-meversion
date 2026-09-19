<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matkul = Matakuliah::with('dosen')->get();

        return view('matakuliah.index', compact('matkul'));
    }


    public function create()
    {
        $pengampu = Dosen::all();
        $perodi = Prodi::all();

        return view('matakuliah.create', compact('pengampu', 'perodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'dosen_id' => 'required|exists:dosens,id',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        Matakuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'dosen_id' => $request->dosen_id,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect()->route('matakuliah.index');
    }
}