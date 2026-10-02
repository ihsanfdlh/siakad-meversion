<?php

namespace App\Http\Controllers;

class MatapelajaranController extends Controller
{
    public function index()
    {
        return 'Halaman daftar seluruh Mata pelajaran';
    }

    public function show($kode)
    {
        return "Halaman detail Mata pelajaran dengan Kode: {$kode}";
    }
}
