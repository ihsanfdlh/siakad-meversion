@extends('layouts.header')
@section('title', 'Biodata - ' . $mahasiswa->nama)

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('mahasiswa.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Mahasiswa</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-id-card"></i> BIODATA MAHASISWA</span>
        <h1>{{ $mahasiswa->nama }}</h1>
        <p>Detail profil lengkap dan riwayat akademik mahasiswa yang terdaftar di sistem.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id_mahasiswa) }}" class="button button-primary">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Edit Biodata</span>
        </a>
    </div>
</div>

<div class="detail-card">
    <div class="detail-header">
        <div class="detail-avatar">
            {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
        </div>
        <div class="detail-header-info">
            <h2>{{ $mahasiswa->nama }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">NIM: {{ $mahasiswa->nim }}</span>
                <span class="status-pill">Semester {{ $mahasiswa->semester }}</span>
                <span class="code-pill">{{ $mahasiswa->prodi?->nama ?? 'Prodi Belum Diatur' }}</span>
            </div>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</span>
            <span class="detail-value">{{ $mahasiswa->jenis_kelamin ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-calendar-days"></i> Tempat & Tanggal Lahir</span>
            <span class="detail-value">{{ $mahasiswa->tempat_lahir ?? '-' }}, {{ $mahasiswa->tanggal_lahir ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-hands-praying"></i> Agama</span>
            <span class="detail-value">{{ $mahasiswa->agama ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-phone"></i> No. Telepon</span>
            <span class="detail-value">{{ $mahasiswa->no_telp ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-envelope"></i> Email</span>
            <span class="detail-value">{{ $mahasiswa->email ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-calendar-check"></i> Tahun Masuk (Angkatan)</span>
            <span class="detail-value">{{ $mahasiswa->angkatan ?? '-' }}</span>
        </div>

        <div class="detail-item" style="grid-column: 1 / -1;">
            <span class="detail-label"><i class="fa-solid fa-location-dot"></i> Alamat Domisili</span>
            <span class="detail-value">{{ $mahasiswa->alamat ?? '-' }}</span>
        </div>

        <div class="detail-item" style="grid-column: 1 / -1;">
            <span class="detail-label"><i class="fa-solid fa-award"></i> Catatan Nilai Akademik</span>
            <div style="margin-top: 6px;">
                @forelse ($mahasiswa->nilai as $n)
                    <div style="display: inline-flex; align-items: center; gap: 8px; background: var(--bg-surface); padding: 6px 12px; border-radius: 8px; border: 1px solid var(--border-color); margin: 4px 6px 4px 0;">
                        <span style="font-weight: 600;">{{ $n->mahasiswa->nama_mk ?? 'Mata Kuliah' }}:</span>
                        <span class="status-pill">{{ $n->nilai }}</span>
                    </div>
                @empty
                    <p style="color: var(--text-tertiary); font-size: 13.5px; margin: 0;">Belum ada data nilai tercatat.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection