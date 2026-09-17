@extends('layouts.header')
@section('title', 'Ruangan')

@section('content')
<div class="section-heading">
    <div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Ruang</h1><p>Kelola informasi Ruang yang terdaftar di sistem.</p></div>
    <a class="button button-primary" href="{{ route('ruang.create') }}">+ Tambah Ruang</a>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data Ruang</strong><span class="record-count">{{ $data->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead><tr><th>Nomor Ruangan</th><th>Lokasi</th><th>Lantai</th><th>Kapasitas</th></tr></thead>
        <tbody>
        @forelse ($data as $ruang)
            <tr><td><span class="code-pill">{{ $ruang->nomor }}</span></td><td><strong>{{ $ruang->lokasi }}</strong></td><td>{{ $ruang->lantai }}</td><td>{{ $ruang->kapasitas }} Orang</td></tr>
        @empty
            <tr><td class="empty-state" colspan="7"><strong>Belum ada data Ruangan</strong><span>Tambahkan ruangan pertama untuk mulai mengelola data.</span></td></tr>
        @endforelse
        </tbody>
    </table></div>
</div>
@endsection