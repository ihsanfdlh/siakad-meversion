@extends('layouts.header')
@section('title', 'Tambah Ruangan')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('ruang.index') }}">&larr; Kembali ke ruangan</a><span class="eyebrow">DATA RUANGAN</span><h1>Tambah Ruangan</h1><p>Isi informasi berikut untuk menambahkan ruangan baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('ruang.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nomor">Nomor Ruangan</label><input id="nomor" type="text" name="nomor" value="{{ old('nomor') }}" placeholder="Contoh: 101" required></div>
            <div class="field"><label for="lokasi">Lokasi Ruangan (Gedung)</label><input id="lokasi" type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Nama Gedung" required></div>
            <div class="field"><label for="lantai">Lantai</label><input id="lantai" type="number" name="lantai" value="{{ old('lantai') }}" placeholder="1 - 5" required></div>
            <div class="field"><label for="kapasitas">Kapasitas</label><input id="kapasitas" type="number" name="kapasitas" value="{{ old('kapasitas') }}" placeholder="Contoh : 50 Orang" required></div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('ruang.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Ruangan</button></div>
    </form>
@endsection