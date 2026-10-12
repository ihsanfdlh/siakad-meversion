@extends('layouts.header')

@section('title', 'Dashboard Admin')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-gauge-high"></i> DASHBOARD SISTEM</span>
        <h1>Dashboard Akademik</h1>
        <p>Selamat datang kembali! Ringkasan aktivitas dan kontrol manajemen sistem informasi akademik.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="button button-danger">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar (Logout)</span>
            </button>
        </form>
    </div>
</div>

<div class="stats-grid">
    <a class="stat-card" href="{{ route('mahasiswa.index') }}">
        <span class="stat-icon icon-blue">
            <i class="fa-solid fa-user-graduate"></i>
        </span>
        <span class="stat-label">Data Mahasiswa</span>
        <strong>Kelola</strong>
        <span class="stat-link">Buka data &rarr;</span>
    </a>

    <a class="stat-card" href="{{ route('dosen.index') }}">
        <span class="stat-icon icon-purple">
            <i class="fa-solid fa-chalkboard-user"></i>
        </span>
        <span class="stat-label">Data Dosen</span>
        <strong>Kelola</strong>
        <span class="stat-link">Buka data &rarr;</span>
    </a>

    <a class="stat-card" href="{{ route('jurusan.index') }}">
        <span class="stat-icon icon-cyan">
            <i class="fa-solid fa-building-columns"></i>
        </span>
        <span class="stat-label">Data Jurusan</span>
        <strong>Kelola</strong>
        <span class="stat-link">Buka data &rarr;</span>
    </a>

    <a class="stat-card" href="{{ route('matakuliah.index') }}">
        <span class="stat-icon icon-orange">
            <i class="fa-solid fa-book-open"></i>
        </span>
        <span class="stat-label">Mata Kuliah</span>
        <strong>Kelola</strong>
        <span class="stat-link">Buka data &rarr;</span>
    </a>
</div>

<div class="table-card" style="margin-top: 32px;">
    <div class="table-top">
        <strong>Status Sistem & Autentikasi</strong>
        <span class="record-count"><i class="fa-solid fa-shield-halved"></i> Aktif</span>
    </div>
    <div style="padding: 24px;">
        <p style="margin-bottom: 12px; color: var(--text-secondary); font-size: 14.5px;">
            Anda berhasil masuk sebagai administrator sistem. Semua modul data dapat diakses melalui menu navigasi di atas.
        </p>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a class="button button-primary" href="{{ route('welcome') }}">
                <i class="fa-solid fa-house"></i>
                <span>Halaman Utama</span>
            </a>
            <a class="button button-secondary" href="{{ route('jurusan.statistik') }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Statistik Jurusan</span>
            </a>
        </div>
    </div>
</div>
@endsection
