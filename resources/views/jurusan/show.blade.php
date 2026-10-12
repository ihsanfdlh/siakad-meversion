@extends('layouts.header')
@section('title', 'Detail Jurusan - ' . $jurusan->nama)

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('jurusan.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Jurusan</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-building-columns"></i> DETAIL JURUSAN</span>
        <h1>Jurusan {{ $jurusan->nama }}</h1>
        <p>Daftar program studi dan pimpinan pada Jurusan {{ $jurusan->nama }}.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="button button-primary">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Edit Jurusan</span>
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="detail-card" style="margin-bottom: 28px;">
    <div class="detail-header">
        <div class="detail-avatar">
            <i class="fa-solid fa-building-columns"></i>
        </div>
        <div class="detail-header-info">
            <h2>{{ $jurusan->nama }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">Kajur: {{ $jurusan->kajur->nama ?? 'Belum ditentukan' }}</span>
                <span class="code-pill">Sekjur: {{ $jurusan->sekjur->nama ?? 'Belum ditentukan' }}</span>
                <span class="status-pill">{{ $jurusan->prodis->count() }} Program Studi</span>
            </div>
        </div>
    </div>
</div>

<div class="table-card">
    <div class="table-top">
        <strong>Program Studi dalam Jurusan Ini</strong>
        <span class="record-count"><i class="fa-solid fa-layer-group"></i> {{ $jurusan->prodis->count() }} Prodi</span>
    </div>
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Nama Program Studi</th>
                    <th>Jenjang Pendidikan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurusan->prodis as $prodi)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><strong>{{ $prodi->nama }}</strong></td>
                        <td><span class="status-pill">{{ $prodi->jenjang }}</span></td>
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