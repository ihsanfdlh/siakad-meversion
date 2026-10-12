@extends('layouts.header')

@section('title', 'Tambah Mata Kuliah (Query Builder)')

@section('content')
<div class="form-heading">
    <a class="back-link" href="/query-builder">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke Query Builder</span>
    </a>
    <span class="eyebrow"><i class="fa-solid fa-code"></i> QUERY BUILDER DEMO</span>
    <h1>Tambah Mata Kuliah</h1>
    <p>Form penambahan mata kuliah baru.</p>
</div>

@if ($errors->any())
    <div class="alert alert-error">
        <strong>Terjadi kesalahan input:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-card" action="/matakuliah2/simpan" method="POST">
    @csrf

    <div class="form-grid">
        <div class="field">
            <label for="kode_mk">Kode Mata Kuliah</label>
            <input id="kode_mk" type="text" name="kode_mk" value="{{ old('kode_mk') }}" placeholder="Contoh: IF101" required>
        </div>

        <div class="field">
            <label for="nama_mk">Nama Mata Kuliah</label>
            <input id="nama_mk" type="text" name="nama_mk" value="{{ old('nama_mk') }}" placeholder="Contoh: Pemrograman Web" required>
        </div>

        <div class="field">
            <label for="sks">Bobot SKS</label>
            <input id="sks" type="number" name="sks" value="{{ old('sks', 3) }}" min="1" max="6" required>
        </div>

        <div class="field">
            <label for="semester">Semester</label>
            <input id="semester" type="number" name="semester" value="{{ old('semester', 1) }}" min="1" max="8" required>
        </div>

        <div class="field full-width">
            <label for="id_prodi">Program Studi</label>
            <select id="id_prodi" name="id_prodi" required>
                <option value="">-- Pilih Program Studi --</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('id_prodi') == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }} - {{ $prodi->jenjang }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-actions">
        <a class="button button-secondary" href="/query-builder">Batal</a>
        <button class="button button-primary" type="submit">
            <i class="fa-solid fa-floppy-disk"></i>
            <span>Simpan Mata Kuliah</span>
        </button>
    </div>
</form>
@endsection