@extends('layouts.header')
@section('title', 'Tambah Dosen')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('dosen.index') }}">&larr; Kembali ke dosen</a><span class="eyebrow">DATA DOSEN</span><h1>Tambah Dosen</h1><p>Isi informasi berikut untuk menambahkan dosen baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nama">Nama Dosen</label><input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap" required></div>
            <div class="field"><label for="no_telp">Nomor Telepon</label><input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="08xxxxxxxxxx" required></div>
            <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required></div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('dosen.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Dosen</button></div>
    </form>
@endsection