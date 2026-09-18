@extends('layouts.header')
@section('title', 'Mahasiswa')

@section('content')
<div class="section-heading">
    <div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Mahasiswa</h1><p>Kelola informasi mahasiswa yang terdaftar di sistem.</p></div>
    <a class="button button-primary" href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data mahasiswa</strong><span class="record-count">{{ $mahasiswa->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead><tr><th>No</th><th>NIM</th><th>Nama</th><th>No Telepone</th><th>Email</th><th>Prodi</th><th>Semester</th></tr></thead>
        <tbody>
        @forelse ($mahasiswa as $mhs)
            <tr><td class="muted">{{ $loop->iteration }}</td><td><span class="code-pill">{{ $mhs->nim }}</span></td><td><strong>{{ $mhs->nama }}</strong></td><td>{{ $mhs->no_telp }}</td><td>{{ $mhs->email }}</td><td>{{ $mhs->prodi->nama }}</td><td><span class="status-pill">{{ $mhs->semester }}</span></td></tr>
        @empty
            <tr><td class="empty-state" colspan="7"><strong>Belum ada data mahasiswa</strong><span>Tambahkan mahasiswa pertama untuk mulai mengelola data.</span></td></tr>
        @endforelse
        </tbody>
    </table></div>
</div>
@endsection