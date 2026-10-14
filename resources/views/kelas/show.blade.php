@extends('layouts.header')
@section('title', 'Biodata - ' . $kelas->nama)

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow">
            <a href="{{ route('kelas.index') }}">kelas</a>
        </span>
        <span class="eyebrow"> > Detail Kelas</span>
        <h1>Detail Kelas</h1>
        <p>KDetail Kelas, dan mahasiswa aktif yang terdaftar di kelas ini.</p>
    </div>
    <a class="button button-primary" href="{{ route('kelas.create') }}">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Kelas</span>
    </a>
</div>

<div class="detail-card" style="margin-bottom: 28px;">
    <div class="detail-header">
        <div class="detail-avatar">
            <i class="fa-solid fa-building-columns"></i>
        </div>
        <div class="detail-header-info">
            <h2>Kelas : {{ $kelas->nama_kelas }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="status-pill">Semester {{ $kelas->semester ?? 'Belum ditentukan' }}</span>
                <span class="code-pill"> {{ $kelas->prodi->nama ?? 'Belum ditentukan' }}</span>
                <span class="status-pill">{{ $kelas->mahasiswa->count() }} Mahasiswa</span>
            </div>
        </div>
    </div>
</div>
<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelas->mahasiswa as $mahasiswa)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><strong>{{ $mahasiswa->nama }}</strong></td>
                        <td><span class="status-pill">{{ $mahasiswa->nim }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="3">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada Program Studi</strong>
                            <span>Belum ada data program studi yang dinaungi oleh jurusan ini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection