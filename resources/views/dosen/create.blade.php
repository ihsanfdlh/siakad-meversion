@extends('layouts.header')
@section('title', 'Tambah Dosen')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('dosen.index') }}">&larr; Kembali ke dosen</a><span class="eyebrow">DATA DOSEN</span><h1>Tambah Dosen</h1><p>Isi informasi berikut untuk menambahkan dosen baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field">
                <label for="nip">NIP</label>
                <input id="nip" type="text" name="nip" value="{{ old('nip') }}" placeholder="NIP" required>
            </div>
            <div class="field">
                <label for="nama">Nama Dosen</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap" required>
            </div>
            <div class="field">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat lahir" required>
            </div>
            <div class="field">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal lahir" required>
            </div>
            <div class="field">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">-- Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="field">
                <label for="agama">Agama</label>
                <input id="agama" type="text" name="agama" value="{{ old('agama') }}" placeholder="Agama" required>
            </div>
            <div class="field">
                <label for="alamat">Alamat</label>
                <input id="alamat" type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" required>
            </div>
            <div class="field">
                <label for="no_telp">Nomor Telepon</label>
                <input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="08xxxxxxxxxx" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required>
            </div>
            <div class="field">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <select id="pendidikan_terakhir" name="pendidikan_terakhir">
                    <option value="">-- Jenis Kelamin --</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                </select>
            </div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('dosen.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Dosen</button></div>
    </form>
@endsection