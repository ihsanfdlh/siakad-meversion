@extends('layouts.header')
@section('title', 'Program Studi')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-layer-group"></i> DATA AKADEMIK</span>
        <h1>Daftar Program Studi</h1>
        <p>Kelola jenjang pendidikan, pimpinan Kaprodi, dan jurusan naungan program studi.</p>
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <a class="button button-secondary" href="{{ route('statistik-prodi') }}">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Statistik Prodi</span>
        </a>
        <a class="button button-primary" href="{{ route('prodi.create') }}">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Program Studi</span>
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data Program Studi Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $prodis->count() }} Program Studi</span>
    </div>
    
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Program Studi</th>
                    <th>Jenjang</th>
                    <th>Kepala Program Studi (Kaprodi)</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($prodis as $prodi)
                <tr>
                    <td class="muted">{{ $loop->iteration }}</td>
                    <td><strong>{{ $prodi->nama }}</strong></td>
                    <td><span class="status-pill">{{ $prodi->jenjang }}</span></td>
                    <td>
                        @if($prodi->kaprodi)
                            <span style="font-weight: 600;">{{ $prodi->kaprodi->nama }}</span>
                        @else
                            <span style="color: var(--text-tertiary); font-style: italic;">Belum ada Kaprodi</span>
                        @endif
                    </td>
                    <td>
                        @if($prodi->jurusan)
                            <span class="code-pill">{{ $prodi->jurusan->nama }}</span>
                        @else
                            <span style="color: var(--text-tertiary); font-style: italic;">Belum ada Jurusan</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="empty-state" colspan="5">
                        <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                        <strong>Belum ada data Program Studi</strong>
                        <span>Tambahkan data Program Studi pertama untuk mulai mengelola kurikulum.</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection