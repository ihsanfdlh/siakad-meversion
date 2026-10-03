@extends('layouts.app')
@section('judul', 'Detail Siswa - ' . $siswa->nama)
@section('konten')
    <h1>Detail siswa</h1>
    <p><strong>NIM:</strong> {{ $siswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Program Studi:</strong> {{ $siswa->prodi }}</p>
    <p><strong>Semester:</strong> {{ $siswa->semester }}</p>
    <a href="{{ route('akademik.siswa.index') }}">&laquo; Kembali ke Daftar</a>
@endsection