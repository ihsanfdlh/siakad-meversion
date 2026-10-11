@extends('layouts.header')
@section('title', $jurusan->nama)
@section('content')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('jurusan.index') }}">
            &larr; Kembali ke jurusan
        </a>
        <span class="eyebrow">DATA AKADEMIK</span>
        <h1>{{ $jurusan->nama }}</h1>
        <p>Daftar Program Studi yang ada pada Jurusan{{ $jurusan->nama }}.</p>
    </div>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Prodi</th>
                    <th>Jenjang</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jurusan->prodis as $prodi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prodi->nama }}</td>
                        <td>{{ $prodi->jenjang }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="7">
                            <strong>Belum ada Program Studi</strong>
                            <span>Tambahkan Jurusan pertama untuk mulai mengelola data.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection