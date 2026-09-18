@extends('layouts.header')
@section('title', 'Program Stuudi')

@section('content')
<div class="section-heading">
    <div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Program Studi</h1><p>Kelola informasi Program Studi yang terdaftar di sistem.</p></div>
    <a class="button button-primary" href="{{ route('prodi.create') }}">+ Tambah Program Studi</a>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data Program Studi</strong><span class="record-count">{{ $prodis->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead><tr><th>No</th><th>Nama</th><th>Jurusan</th><th>Tahun Terbit</th></tr></thead>
        <tbody>
        @forelse ($prodis as $prodi)
            <tr><td class="muted">{{ $loop->iteration }}</td><td><strong>{{ $prodi->nama }}</strong></td><td>{{ $prodi->jurusan->nama ?? 'Belum ada jurusan' }}</td><td>{{ $prodi->thn_terbit }}</td></tr>
        @empty
            <tr><td class="empty-state" colspan="7"><strong>Belum ada data Program Studi</strong><span>Tambahkan Program Studi pertama untuk mulai mengelola data.</span></td></tr>
        @endforelse
        </tbody>
    </table></div>
</div>
@endsection