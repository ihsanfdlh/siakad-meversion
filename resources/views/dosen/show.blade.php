@extends('layouts.header')
@section('title', 'Biodata Dosen - ' . $dosen->nama)

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('dosen.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Dosen</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-id-badge"></i> BIODATA DOSEN</span>
        <h1>{{ $dosen->nama }}</h1>
        <p>Detail informasi profil pengajar dan kontak tenaga pendidik.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('dosen.edit', $dosen->id) }}" class="button button-primary">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Edit Biodata</span>
        </a>
    </div>
</div>

<div class="detail-card">
    <div class="detail-header">
        <div class="detail-avatar">
            {{ strtoupper(substr($dosen->nama, 0, 1)) }}
        </div>
        <div class="detail-header-info">
            <h2>{{ $dosen->nama }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">NIP: {{ $dosen->nip }}</span>
                <span class="status-pill">{{ $dosen->pendidikan_terakhir ?? 'Pendidikan -' }}</span>
            </div>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-graduation-cap"></i> Pendidikan Terakhir</span>
            <span class="detail-value">{{ $dosen->pendidikan_terakhir ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</span>
            <span class="detail-value">{{ $dosen->jenis_kelamin ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-calendar-days"></i> Tanggal Lahir</span>
            <span class="detail-value">{{ $dosen->tanggal_lahir ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-hands-praying"></i> Agama</span>
            <span class="detail-value">{{ $dosen->agama ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-phone"></i> No. Telepon</span>
            <span class="detail-value">{{ $dosen->no_telp ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-envelope"></i> Email</span>
            <span class="detail-value">{{ $dosen->email ?? '-' }}</span>
        </div>

        <div class="detail-item" style="grid-column: 1 / -1;">
            <span class="detail-label"><i class="fa-solid fa-location-dot"></i> Alamat Tempat Tinggal</span>
            <span class="detail-value">{{ $dosen->alamat ?? '-' }}</span>
        </div>
    </div>
</div>
@endsection