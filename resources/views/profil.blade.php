@extends('layouts.header')
@section('title', 'Profil Pengembang - ' . $nama)

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('welcome') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Beranda</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-user"></i> PROFIL MAHASISWA</span>
        <h1>Profil Mahasiswa</h1>
        <p>Informasi pengembang aplikasi dan data akademik mahasiswa.</p>
    </div>
</div>

<div class="detail-card">
    <div class="detail-header">
        <div class="detail-avatar">
            {{ strtoupper(substr($nama, 0, 1)) }}
        </div>
        <div class="detail-header-info">
            <h2>{{ $nama }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">NIM: {{ $nim }}</span>
                <span class="status-pill">{{ $prodi }}</span>
            </div>
        </div>
    </div>
    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-signature"></i> Nama Lengkap</span>
            <span class="detail-value">{{ $nama }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-id-card"></i> Nomor Induk Mahasiswa</span>
            <span class="detail-value">{{ $nim }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-graduation-cap"></i> Program Studi</span>
            <span class="detail-value">{{ $prodi }}</span>
        </div>
    </div>
</div>
@endsection