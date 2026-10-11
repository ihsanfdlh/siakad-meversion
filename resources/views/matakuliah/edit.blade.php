@extends('layouts.header')

@section('title', 'Update Mata Kuliah')

@section('content')
<div class="form-heading">
    <a class="back-link" href="{{ route('matakuliah.index') }}">
        &larr; Kembali ke mata kuliah
    </a>

    <span class="eyebrow">DATA MATA KULIAH</span>
    <h1>Edit Mata Kuliah</h1>
    <p>Ubah informasi mata kuliah berikut sesuai kebutuhan.</p>
</div>

@if ($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali data Anda:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-card"
      action="{{ route('matakuliah.update', $matakuliah->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="form-grid">
        <div class="field">
            <label for="kode_mk">Kode Mata Kuliah</label>
            <input
                id="kode_mk"
                type="text"
                name="kode_mk"
                value="{{ old('kode_mk', $matakuliah->kode_mk) }}"
                placeholder="Contoh: IF101"
                required>
        </div>

        <div class="field">
            <label for="nama_mk">Nama Mata Kuliah</label>
            <input
                id="nama_mk"
                type="text"
                name="nama_mk"
                value="{{ old('nama_mk', $matakuliah->nama_mk) }}"
                placeholder="Nama mata kuliah"
                required>
        </div>

        <div class="field">
            <label for="sks">SKS</label>
            <input
                id="sks"
                type="number"
                name="sks"
                value="{{ old('sks', $matakuliah->sks) }}"
                min="1"
                max="6"
                required>
        </div>

        <div class="field">
            <label for="semester">Semester</label>
            <input
                id="semester"
                type="number"
                name="semester"
                value="{{ old('semester', $matakuliah->semester) }}"
                min="1"
                max="14"
                required>
        </div>

        <div class="field">
            <label for="dosen_id">Dosen</label>
            <select id="dosen_id" name="dosen_id" required>
                <option value="">-- Pilih Dosen --</option>

                @foreach ($pengampu as $dsn)
                    <option
                        value="{{ $dsn->id }}"
                        {{ old('dosen_id', $matakuliah->dosen_id) == $dsn->id ? 'selected' : '' }}>
                        {{ $dsn->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="field">
            <label for="id_prodi">Prodi</label>
            <select id="id_prodi" name="id_prodi" required>
                <option value="">-- Pilih Prodi --</option>

                @foreach ($perodi as $prodi)
                    <option
                        value="{{ $prodi->id }}"
                        {{ old('id_prodi', $matakuliah->id_prodi) == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-actions">
        <a class="button button-secondary"
           href="{{ route('matakuliah.index') }}">
            Batal
        </a>

        <button class="button button-primary" type="submit">
            Simpan Perubahan
        </button>
    </div>
</form>
@endsection