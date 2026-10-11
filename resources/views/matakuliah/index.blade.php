@extends('layouts.header')
@section('title', 'Mata Kuliah')

@section('content')
<div class="section-heading"><div><span class="eyebrow">DATA AKADEMIK</span><h1>Daftar Mata Kuliah</h1><p>Kelola mata kuliah yang tersedia di setiap semester.</p></div><a class="button button-primary" href="{{ route('matakuliah.create') }}">+ Tambah Mata Kuliah</a></div>
@if (session('pesan'))<div class="alert alert-success">{{ session('pesan') }}</div>@endif
<div class="table-card"><div class="table-top"><strong>Data mata kuliah</strong><span class="record-count">{{ $matkul->count() }} data</span></div>
<div class="table-scroll">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen Pengampu</th>
                <th>Prodi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($matkul as $matakuliah)
                <tr>
                    <td class="muted">{{ $loop->iteration }}</td>
                    <td><span class="code-pill">{{ $matakuliah->kode_mk }}</span></td>
                    <td><strong>{{ $matakuliah->nama_mk }}</strong></td>
                    <td>{{ $matakuliah->sks }}</td>
                    <td><span class="status-pill">{{ $matakuliah->semester }}</span></td>
                    <td>{{ $matakuliah->dosen->nama ?? 'Belum ada dosen' }}</td>
                    <td>{{ $matakuliah->prodi->nama ?? 'Belum ada prodi' }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $matakuliah->id) }}">
                            Detail
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('matakuliah.edit', $matakuliah->id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button  class="code-pill" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="empty-state" colspan="7"><strong>Belum ada data mata kuliah</strong><span>Tambahkan mata kuliah pertama untuk mulai mengelola data.</span></td></tr>
            @endforelse
        </tbody>
    </table></div></div>
@endsection