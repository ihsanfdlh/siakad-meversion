@extends('layouts.header')
@section('title', 'Mata Kuliah')

@section('content')
<div class="section-heading"><div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Mata Kuliah</h1><p>Kelola mata kuliah yang tersedia di setiap semester.</p></div><a class="button button-primary" href="{{ route('matakuliah.create') }}">+ Tambah Mata Kuliah</a></div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card"><div class="table-top"><strong>Data mata kuliah</strong><span class="record-count">{{ $matakuliahs->count() }} data</span></div><div class="table-scroll"><table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen Pengampu</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($matakuliahs as $matakuliah)
                <tr>
                    <td class="muted">{{ $loop->iteration }}</td>
                    <td><span class="code-pill">{{ $matakuliah->kode_mk }}</span></td>
                    <td><strong>{{ $matakuliah->nama_mk }}</strong></td>
                    <td>{{ $matakuliah->sks }}</td>
                    <td><span class="status-pill">{{ $matakuliah->semester }}</span></td>
                    <td>{{ $matakuliah->dosen->nama ?? 'Belum ada dosen' }}</td>
                </tr>
            @empty
                <tr><td class="empty-state" colspan="6"><strong>Belum ada data mata kuliah</strong><span>Tambahkan mata kuliah pertama untuk mulai mengelola data.</span></td></tr>
            @endforelse
        </tbody>
    </table></div></div>
@endsection