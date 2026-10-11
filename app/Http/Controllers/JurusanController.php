<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::with('kajur')->get();

        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $dosen = Dosen::all();
        
        return view('jurusan.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_kajur' => 'required|exists:dosens,id',
            'id_sekjur' => 'required|exists:dosens,id',
        ]);

        Jurusan::create([
            'nama' => $request->nama,
            'id_kajur' => $request->id_kajur,
            'id_sekjur' => $request->id_sekjur,
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success', 'Data Jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {   
        $jurusan->load('prodis');
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        $dosen = Dosen::all();
        
        return view('jurusan.edit', compact('jurusan','dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama' => 'required',
            'id_kajur' => 'required|exists:dosens,id',
            'id_sekjur' => 'required|exists:dosens,id',
        ]);

        $jurusan->update([
            'nama' => $request->nama,
            'id_kajur' => $request->id_kajur,
            'id_sekjur' => $request->id_sekjur,
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success', 'Data Jurusan berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()
            ->route('jurusan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
    public function statistik()
    {
    $rekap = DB::table('jurusans')
            ->join(
                'prodis',
                'jurusans.id',
                '=',
                'prodis.id_jurusan'
            )
            ->select(
                'jurusans.id',
                'jurusans.nama',
                DB::raw('COUNT(prodis.id) as jumlah')
            )
            ->groupBy(
                'jurusans.id',
                'jurusans.nama',
            )
            ->orderBy('jurusans.nama')
            ->get();

        return view('jurusan.statistik', compact('rekap'));
    }
}
