@extends('layouts.header')
@section('title', 'UPDATE - '. $jurusan->nama)
@section('content')
<div class="form-heading">
    <a class="back-link" href="{{ route('prodi.index') }}">&larr; Kembali ke Jurusan</a>
    <h1>UPDATE {{ $jurusan->nama }}</h1>
    <p>Perbarui data Jurusan</p>
</div>
@if ($errors->any())<div class="alert alert-error">
    <strong>Periksa kembali data Anda:</strong>
    <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach</ul>
</div>@endif
<form class="form-card" action="{{ route('jurusan.update', $jurusan->getKey()) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="field"><label for="nama">Nama Jurusan</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama', $jurusan->nama) }}" placeholder="Nama Jurusan" required>
            </div>
            <div class="field">
                <label for="id_kajur">Kepala Jurusan</label>
                <select id="id_kajur" name="id_kajur">
                    <option value="">-- Pilih Kepala Jurusan --</option>

                    @foreach ($dosen as $dsn)
                        <option value="{{ $dsn->id }}"
                            {{ old('id_kajur', $jurusan->id_kajur) == $dsn->id ? 'selected' : '' }}>
                           {{ $dsn->nama }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="field">
                <label for="id_sekjur">Sekretaris Jurusan</label>
                <select id="id_sekjur" name="id_sekjur">
                    <option value="">-- Pilih Sekretaris Jurusan --</option>

                    @foreach ($dosen as $dsn)
                        <option value="{{ $dsn->id }}"
                            {{ old('id_sekjur', $jurusan->id_sekjur) == $dsn->id ? 'selected' : '' }}>
                           {{ $dsn->nama }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('jurusan.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan</button></div>
    </form>
@endsection