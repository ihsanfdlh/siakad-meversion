@extends('layouts.header')
@section('title', 'Daftar Ruangan')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-door-open"></i> DATA FASILITAS</span>
        <h1>Daftar Ruang Perkuliahan</h1>
        <p>Kelola nomor ruangan, lokasi gedung, lantai, dan daya tampung kapasitas belajar mahasiswa.</p>
    </div>
    <a class="button button-primary" href="{{ route('ruang.create') }}">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Ruang</span>
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data Ruang Belajar Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $data->count() }} Ruangan</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 140px;">Nomor Ruangan</th>
                    <th>Lokasi Gedung</th>
                    <th>Lantai</th>
                    <th>Kapasitas Ruang</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($data as $ruang)
                <tr>
                    <td><span class="code-pill"><i class="fa-solid fa-door-closed"></i> {{ $ruang->nomor }}</span></td>
                    <td><strong>{{ $ruang->lokasi }}</strong></td>
                    <td><span class="status-pill">Lantai {{ $ruang->lantai }}</span></td>
                    <td>
                        <span style="font-weight: 600;">
                            <i class="fa-solid fa-users" style="color: var(--text-tertiary); margin-right: 4px;"></i>
                            {{ $ruang->kapasitas }} Orang
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="empty-state" colspan="4">
                        <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                        <strong>Belum ada data Ruangan</strong>
                        <span>Tambahkan data ruangan pertama untuk mulai mengatur fasilitas perkuliahan.</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection