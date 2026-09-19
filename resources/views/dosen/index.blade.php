@extends('layouts.header')
@section('title', 'Dosen')

@section('content')
<div class="section-heading">
    <div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Dosen</h1><p>Kelola informasi dosen yang terdaftar di sistem.</p></div>
    <a class="button button-primary" href="{{ route('dosen.create') }}">+ Tambah Dosen</a>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data Dosen</strong><span class="record-count">{{ $dosen->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat lahir</th>
                <th>Tanggal lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>No Telepone</th>
                <th>Pendidikan Terakhir</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($dosen as $dsn)
            <tr>
                <td class="muted">{{ $loop->iteration }}</td>
                <td><span class="code-pill">{{ $dsn->nip }}</span></td>
                <td><strong>{{ $dsn->nama }}</strong></td>
                <td>{{ $dsn->tempat_lahir }}</td>
                <td>{{ $dsn->tanggal_lahir }}</td>
                <td>{{ $dsn->jenis_kelamin }}</td>
                <td>{{ $dsn->agama }}</td>
                <td>{{ $dsn->no_telp }}</td>
                <td>{{ $dsn->pendidikan_terakhir }}</td>
            </tr>
        @empty
            <tr><td class="empty-state" colspan="11"><strong>Belum ada data mahasiswa</strong><span>Tambahkan mahasiswa pertama untuk mulai mengelola data.</span></td></tr>
        @endforelse
        </tbody>
    </table></div>
</div>
@endsection