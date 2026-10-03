@extends('layouts.header')
@section('title', 'Detail Mahasiswa ' . $mahasiswa->nama)
@section('content')
<div class="section-heading">
    <a class="back-link" href="{{ route('mahasiswa.index') }}">&larr; Kembali ke mahasiswa</a>
</div>
<div class="table-card">
    <div class="table-scroll"><table>
        {{-- <table border=1 > --}}
        <tr>
            <td colspan=2 align=center><h2>DETAIL BIODATA - {{ $mahasiswa->nama }}</h2></td>
        </tr>
        <tr>
            <td>Nama </td>
            <td><strong>{{ $mahasiswa->nama }}</strong></td>
        </tr>
        <tr>
            <td>Tempat Lahir </td>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir </td>
            <td>{{ $mahasiswa->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin </td>
            <td>{{ $mahasiswa->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Agama </td>
            <td>{{ $mahasiswa->agama }}</td>
        </tr>
        <tr>
            <td>Alamat Domisili </td>
            <td>{{ $mahasiswa->alamat }}</td>
        </tr>
        <tr>
            <td>No Telepone </td>
            <td>{{ $mahasiswa->no_telp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $mahasiswa->email }}</td>
        </tr>
        <tr>
            <td>Tahun Masuk </td>
            <td>{{ $mahasiswa->angkatan }}</td>
        </tr>
        <tr>
            <td>Semester </td>
            <td>{{ $mahasiswa->semester }}</td>
        </tr>
        <tr>
            <td>Program Studi </td>
            <td>{{ $mahasiswa->prodi?->nama ?? 'Prodi tidak ditemukan' }}</td>
        </tr>
    </table></div>
</div>
@endsection