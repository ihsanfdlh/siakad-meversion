@extends('layouts.app')

@section('judul', 'Statistik Akademik')

@section('konten')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-chart-column"></i> STATISTIK AKADEMIK</span>
        <h1>Statistik Mahasiswa & Siswa</h1>
        <p>Ringkasan informasi dan perkembangan data akademik.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a class="button button-secondary" href="{{ route('akademik.siswa.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>Daftar Siswa</span>
        </a>
    </div>
</div>

<div class="table-card">
    <div class="table-top">
        <strong>Informasi Statistik Akademik</strong>
        <span class="record-count"><i class="fa-solid fa-circle-check"></i> Siap</span>
    </div>
    <div style="padding: 28px;">
        <p style="color: var(--text-secondary); font-size: 15px; margin-bottom: 20px;">
            Halaman rekapitulasi data akademik mahasiswa dan siswa terdaftar. Semua data terpusat dan tersinkronisasi.
        </p>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a class="button button-primary" href="{{ route('akademik.siswa.index') }}">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Kelola Siswa</span>
            </a>
            <a class="button button-secondary" href="{{ route('akademik.mapel.index') }}">
                <i class="fa-solid fa-book"></i>
                <span>Mata Pelajaran</span>
            </a>
        </div>
    </div>
</div>
@endsection