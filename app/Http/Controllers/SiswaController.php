<?php

namespace App\Http\Controllers;

class SiswaController extends Controller
{
    public function index()
    {
        return 'Halaman daftar seluruh siswa';
    }

    public function show($nis)
    {
        return "Halaman detail siswa dengan NIS: {$nis}";
    }

}
