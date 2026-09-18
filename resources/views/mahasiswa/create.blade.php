@extends('layouts.header')
@section('title', 'Tambah Mahasiswa')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('mahasiswa.index') }}">&larr; Kembali ke mahasiswa</a><span class="eyebrow">DATA MAHASISWA</span><h1>Tambah Mahasiswa</h1><p>Isi informasi berikut untuk menambahkan mahasiswa baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nim">NIM</label><input id="nim" type="text" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 2301001" required></div>
            <div class="field"><label for="nama">Nama Mahasiswa</label><input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap" required></div>
            <div class="field"><label for="no_telp">No Telepone</label><input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 08123456-7890" required></div>
            <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="xyzbcaa@gmail.com" required></div>
            <div class="field"><label for="prodi">Program Studi</label><input id="prodi" type="text" name="prodi" value="{{ old('prodi') }}" placeholder="Contoh: Teknik Informatika" required></div>
            <div class="field"><label for="semester">Semester</label><input id="semester" type="number" name="semester" value="{{ old('semester') }}" min="1" max="14" placeholder="1 - 14" required></div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('mahasiswa.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Mahasiswa</button></div>
    </form>
@endsection