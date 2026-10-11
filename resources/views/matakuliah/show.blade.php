@extends('layouts.header')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <h1>Detail Mata Kuliah</h1>
    <p>
        <strong>Kode Mata Kuliah:</strong>
        {{ $matakuliah->kode_mk }}
    </p>
    <p>
        <strong>Nama Mata Kuliah:</strong>
        {{ $matakuliah->nama_mk }}
    </p>
    <p>
        <strong>SKS:</strong>
        {{ $matakuliah->sks }}
    </p>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matakuliah->nilaiMatakuliah as $nilai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nilai->mahasiswa->nim ?? '-' }}</td>
                    <td>{{ $nilai->mahasiswa->nama ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        Belum ada mahasiswa yang mengambil mata kuliah ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <p>
        <a href="{{ route('matakuliah.index') }}">
            Kembali ke Daftar Mata Kuliah
        </a>
    </p>
@endsection