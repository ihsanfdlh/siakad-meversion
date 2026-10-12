@extends('layouts.header')

@section('title', 'Statistik Jurusan')

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('jurusan.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Jurusan</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-chart-pie"></i> STATISTIK AKADEMIK</span>
        <h1>Statistik Rekapitulasi Jurusan</h1>
        <p>Distribusi jumlah program studi per jurusan di sistem informasi akademik.</p>
    </div>
</div>

@if (session('pesan'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('pesan') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Rekap Jumlah Program Studi per Jurusan</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ count($rekap) }} Jurusan</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Nama Jurusan</th>
                    <th style="width: 200px;">Jumlah Program Studi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $index => $item)
                    <tr>
                        <td class="muted">{{ $index + 1 }}</td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>
                            <span class="status-pill">
                                <i class="fa-solid fa-layer-group"></i> {{ $item->jumlah }} Prodi
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="3">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Data tidak ditemukan</strong>
                            <span>Belum ada data jurusan atau prodi untuk direkap.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection