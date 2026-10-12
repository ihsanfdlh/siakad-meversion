@extends('layouts.header')

@section('title', 'Statistik Program Studi')

@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('prodi.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Program Studi</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-chart-pie"></i> STATISTIK AKADEMIK</span>
        <h1>Statistik Program Studi</h1>
        <p>Distribusi jumlah mahasiswa terdaftar pada masing-masing program studi.</p>
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
        <strong>Rekapitulasi Mahasiswa per Prodi</strong>
        <span class="record-count"><i class="fa-solid fa-layer-group"></i> {{ count($rekap) }} Prodi</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Program Studi</th>
                    <th style="width: 140px;">Jenjang</th>
                    <th style="width: 200px;">Jumlah Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekap as $index => $item)
                    <tr>
                        <td class="muted">{{ $index + 1 }}</td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td><span class="code-pill">{{ $item->jenjang }}</span></td>
                        <td>
                            <span class="status-pill">
                                <i class="fa-solid fa-user-graduate"></i> {{ $item->jumlah }} Orang
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="4">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Data tidak ditemukan</strong>
                            <span>Belum ada data mahasiswa untuk direkap.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection