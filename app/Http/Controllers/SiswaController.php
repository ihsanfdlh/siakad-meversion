<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class SiswaController extends Controller
{
    public function index() { return 'index: daftar Siswa'; }
    public function create() { return 'create: form tambah Siswa'; }
    public function store(Request $request) { return 'store: simpan data baru'; }
    public function show($id) { return "show: detail Siswa id {$id}"; }
    public function edit($id) { return "edit: form edit Siswa id {$id}"; }
    public function update(Request $request, $id) { return "update: perbarui data id {$id}"; }
    public function destroy($id) { return "destroy: hapus data id {$id}"; }
}
