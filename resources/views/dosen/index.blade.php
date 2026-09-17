@extends('layouts.header')
@section('title', 'Dosen')

@section('content')
<div class="section-heading"><div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Dosen</h1><p>Kelola informasi dosen dan kontak pengajar.</p></div><a class="button button-primary" href="{{ route('dosen.create') }}">+ Tambah Dosen</a></div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card"><div class="table-top"><strong>Data dosen</strong><span class="record-count">{{ $dosen->count() }} data</span></div><div class="table-scroll"><table>
<thead><tr><th>No</th><th>Nama Dosen</th><th>No. Telepon</th><th>Email</th></tr></thead><tbody>
@forelse ($dosen as $dsn)<tr><td class="muted">{{ $loop->iteration }}</td><td><strong>{{ $dsn->nama }}</strong></td><td>{{ $dsn->no_telp }}</td><td>{{ $dsn->email }}</td></tr>
@empty<tr><td class="empty-state" colspan="4"><strong>Belum ada data dosen</strong><span>Tambahkan dosen pertama untuk mulai mengelola data.</span></td></tr>@endforelse
</tbody></table></div></div>
@endsection