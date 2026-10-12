@extends('layouts.header')

@section('title', 'Demo Query Builder')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-code"></i> QUERY BUILDER</span>
        <h1>Data Mahasiswa (Demo)</h1>
        <p>Demonstrasi penggunaan Laravel Query Builder untuk manipulasi dan pemfilteran data mahasiswa.</p>
    </div>
    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
        <a class="button button-primary" href="/mahasiswa2/tambah">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Mahasiswa</span>
        </a>
        <a class="button button-secondary" href="/query-builder/filter">
            <i class="fa-solid fa-filter"></i>
            <span>Semester &ge; 3</span>
        </a>
        <a class="button button-secondary" href="/query-builder/filter2">
            <i class="fa-solid fa-filter"></i>
            <span>Semester 3 &ndash; 6</span>
        </a>
        <a class="button button-secondary" href="/statistik-prodi">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Statistik Prodi</span>
        </a>
    </div>
</div>

{{-- Pesan sukses --}}
@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

{{-- Pesan error --}}
@if (session('error'))
    <div class="alert alert-error">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span>{{ session('error') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Hasil Query Builder</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $data->total() }} Mahasiswa</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>Program Studi</th>
                    <th style="text-align: right; width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $mahasiswa)
                    <tr>
                        <td class="muted">{{ $mahasiswa->id_mahasiswa }}</td>
                        <td><span class="code-pill">{{ $mahasiswa->nim }}</span></td>
                        <td><strong>{{ $mahasiswa->nama_mahasiswa }}</strong></td>
                        <td><span class="status-pill">Semester {{ $mahasiswa->semester }}</span></td>
                        <td>{{ $mahasiswa->nama_prodi }}</td>
                        <td style="text-align: right;">
                            <div class="action-group" style="justify-content: flex-end;">
                                <a href="/mahasiswa2/update/{{ $mahasiswa->id_mahasiswa }}" class="btn-action btn-action-edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a href="/mahasiswa2/delete/{{ $mahasiswa->id_mahasiswa }}"
                                    class="btn-action btn-action-delete"
                                    onclick="return confirm('Yakin ingin menghapus data {{ $mahasiswa->nama_mahasiswa }}?')">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="6">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Data mahasiswa tidak ditemukan</strong>
                            <span>Tidak ada data yang sesuai dengan kriteria filter saat ini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $data->links() }}
    </div>
</div>
@endsection