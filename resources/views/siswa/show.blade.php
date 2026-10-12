@extends('layouts.app')

@section('judul', 'Detail Siswa - ' . $siswa->nama)

@section('konten')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('akademik.siswa.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Siswa</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-id-card"></i> BIODATA SISWA</span>
        <h1>{{ $siswa->nama }}</h1>
        <p>Detail profil dan data akademik siswa.</p>
    </div>
</div>

<div class="detail-card">
    <div class="detail-header">
        <div class="detail-avatar">
            {{ strtoupper(substr($siswa->nama, 0, 1)) }}
        </div>
        <div class="detail-header-info">
            <h2>{{ $siswa->nama }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">NIM: {{ $siswa->nim }}</span>
                <span class="status-pill">{{ $siswa->prodi }}</span>
                <span class="code-pill">Semester {{ $siswa->semester }}</span>
            </div>
        </div>
    </div>
    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-id-card"></i> NIM</span>
            <span class="detail-value">{{ $siswa->nim }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-signature"></i> Nama Siswa</span>
            <span class="detail-value">{{ $siswa->nama }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-graduation-cap"></i> Program Studi</span>
            <span class="detail-value">{{ $siswa->prodi }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-calendar"></i> Semester</span>
            <span class="detail-value">{{ $siswa->semester }}</span>
        </div>
    </div>
</div>
@endsection