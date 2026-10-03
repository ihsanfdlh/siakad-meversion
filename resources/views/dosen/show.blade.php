@extends('layouts.header')
@section('title', 'Detail Dosen ' . $dosen->nama)
@section('content')
<div class="section-heading">
    <a class="back-link" href="{{ route('dosen.index') }}">&larr; Kembali ke dosen</a>
</div>
<div class="table-card">
    <div class="table-scroll"><table>
        {{-- <table border=1 > --}}
        <tr>
            <td colspan=2 align=center><h2>DETAIL BIODATA - {{ $dosen->nama }}</h2></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><strong>{{ $dosen->nama }}</strong></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><strong>{{ $dosen->pendidikan_terakhir }}</strong></td>
        </tr>
        <tr>
            <td>NIP </td>
            <td>{{ $dosen->nip }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir </td>
            <td>{{ $dosen->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin </td>
            <td>{{ $dosen->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Agama </td>
            <td>{{ $dosen->agama }}</td>
        </tr>
        <tr>
            <td>Alamat </td>
            <td>{{ $dosen->alamat }}</td>
        </tr>
        <tr>
            <td>No Telepone </td>
            <td>{{ $dosen->no_telp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $dosen->email }}</td>
        </tr>
    </table></div>
</div>
@endsection