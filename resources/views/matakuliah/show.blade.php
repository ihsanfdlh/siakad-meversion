@extends('layouts.header')

@section('title', 'Detail Mata Kuliah - ' . $matakuliah->nama_mk)

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('matakuliah.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Mata Kuliah</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-book-open"></i> DETAIL KURIKULUM</span>
        <h1>{{ $matakuliah->nama_mk }}</h1>
        <p>Informasi detail bobot SKS, dosen pengampu, dan daftar mahasiswa pengambil mata kuliah.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="button button-primary">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Edit Mata Kuliah</span>
        </a>
    </div>
</div>

<div class="detail-card" style="margin-bottom: 28px;">
    <div class="detail-header">
        <div class="detail-avatar">
            <i class="fa-solid fa-book-bookmark"></i>
        </div>
        <div class="detail-header-info">
            <h2>{{ $matakuliah->nama_mk }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">Kode: {{ $matakuliah->kode_mk }}</span>
                <span class="status-pill">{{ $matakuliah->sks }} SKS</span>
                <span class="code-pill">Semester {{ $matakuliah->semester }}</span>
            </div>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-chalkboard-user"></i> Dosen Pengampu</span>
            <span class="detail-value">{{ $matakuliah->dosen->nama ?? 'Belum ada dosen' }}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-layer-group"></i> Program Studi</span>
            <span class="detail-value">{{ $matakuliah->prodi->nama ?? 'Belum ada prodi' }}</span>
        </div>
    </div>
</div>

<div class="table-card">
    <div class="table-top">
        <strong>Daftar Mahasiswa yang Mengambil Mata Kuliah Ini</strong>
        <span class="record-count"><i class="fa-solid fa-users"></i> {{ $matakuliah->nilaiMatakuliah->count() }} Mahasiswa</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($matakuliah->nilaiMatakuliah as $nilai)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><span class="code-pill">{{ $nilai->mahasiswa->nim ?? '-' }}</span></td>
                        <td><strong>{{ $nilai->mahasiswa->nama ?? '-' }}</strong></td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="3">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada mahasiswa</strong>
                            <span>Belum ada mahasiswa yang tercatat mengambil mata kuliah ini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection