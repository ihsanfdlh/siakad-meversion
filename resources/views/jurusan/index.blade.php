@extends('layouts.header')
@section('title', 'Juruasan')
@section('content')
<div class="section-heading">
    <div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Jurusan</h1><p>Kelola informasi Jurusan yang terdaftar di sistem.</p></div>
    <a class="button button-primary" href="{{ route('jurusan.create') }}">+ Tambah Jurusan</a>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data Jurusan</strong><span class="record-count">{{ $data->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead><tr><th>No</th><th>Nama</th><th>Kepala Jurusan</th><th>Sekretaris Jurusan</th><th>Tahun Terbit</th></tr></thead>
        <tbody>
        @forelse ($data as $jrsn)
            <tr><td class="muted">{{ $loop->iteration }}</td><td><strong>{{ $jrsn->nama }}</strong></td><td>{{ $jrsn->kajur->nama ?? 'Belum ada Kepala Jurusan' }}</td><td>{{ $jrsn->sekjur->nama ?? 'Belum ada Sekretaris Jurusan' }}</td><td>{{ $jrsn->thn_terbit }}</td></tr>
        @empty
            <tr><td class="empty-state" colspan="7"><strong>Belum ada data Jurusan</strong><span>Tambahkan Jurusan pertama untuk mulai mengelola data.</span></td></tr>
        @endforelse
        </tbody>
    </table></div>
</div>
@endsection