@extends('layouts.header')
@section('title', 'Tambah Jurusan')
@section('content')
<div class="form-heading">
    <a class="back-link" href="{{ route('prodi.index') }}">&larr; Kembali ke Jurusan</a>
    <span class="eyebrow">DATA prodi</span>
    <h1>Tambah Jurusan</h1>
    <p>Isi informasi berikut untuk menambahkan Jurusan baru.</p>
</div>
@if ($errors->any())<div class="alert alert-error">
    <strong>Periksa kembali data Anda:</strong>
    <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach</ul>
</div>@endif
<form class="form-card" action="{{ route('jurusan.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nama">Nama Jurusan</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Jurusan" required></div>
            <div class="field"><label for="thn_terbit">Tahun Terbit</label>
                <input id="tnh_terbit" type="number" name="thn_terbit" value="{{ old('thn_terbit') }}" placeholder="Contoh: 2009" required></div>
            <div class="field">
                <label for="id_kajur">Dosen</label>
                <select id="id_kajur" name="id_kajur">
                    <option value="">-- Pilih Kepala Jurusan --</option>

                    @foreach ($dosen as $dsn)
                        <option value="{{ $dsn->id }}">
                            {{ $dsn->nama }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="field">
                <label for="id_sekjur">Dosen</label>
                <select id="id_sekjur" name="id_sekjur">
                    <option value="">-- Pilih Sekretaris Jurusan --</option>

                    @foreach ($dosen as $dsn)
                        <option value="{{ $dsn->id }}">
                            {{ $dsn->nama }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('jurusan.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Jurusan</button></div>
    </form>
@endsection