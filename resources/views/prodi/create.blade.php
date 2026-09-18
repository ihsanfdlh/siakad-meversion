@extends('layouts.header')
@section('title', 'Tambah prodi')
@section('content')
<div class="form-heading">
    <a class="back-link" href="{{ route('prodi.index') }}">&larr; Kembali ke prodi</a>
    <span class="eyebrow">DATA prodi</span>
    <h1>Tambah prodi</h1>
    <p>Isi informasi berikut untuk menambahkan prodi baru.</p>
</div>
@if ($errors->any())<div class="alert alert-error">
    <strong>Periksa kembali data Anda:</strong>
    <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach</ul>
</div>@endif
<form class="form-card" action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nama">Nama Program Studi</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Program Studi" required></div>
            <div class="field">
                <label for="id_jurusan">Jurusan</label>
                <select id="id_jurusan" name="id_jurusan">
                    <option value="">-- Pilih Jurusan --</option>

                    @foreach ($jurusan as $jrsn)
                        <option value="{{ $jrsn->id }}">
                            {{ $jrsn->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="id_kaprodi">Jurusan</label>
                <select id="id_kaprodi" name="id_kaprodi">
                    <option value="">-- Pilih Kepala Program Studi --</option>

                    @foreach ($kaprodi as $kps)
                        <option value="{{ $kps->id }}">
                            {{ $kps->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('prodi.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan prodi</button></div>
    </form>
@endsection