@extends('layouts.header')

@section('title', 'Tambah Mahasiswa (Query Builder)')

@section('content')
<div class="form-heading">
    <a class="back-link" href="/query-builder">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke Query Builder</span>
    </a>
    <span class="eyebrow"><i class="fa-solid fa-code"></i> QUERY BUILDER DEMO</span>
    <h1>Tambah Mahasiswa</h1>
    <p>Form penambahan mahasiswa menggunakan Laravel Query Builder.</p>
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

<form class="form-card" action="/mahasiswa2/simpan" method="POST">
    @csrf

    <div class="form-grid">
        <div class="field">
            <label for="nim">NIM</label>
            <input id="nim" type="text" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 2301001" required>
        </div>

        <div class="field">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Mahasiswa" required>
        </div>

        <div class="field">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Kota Kelahiran" required>
        </div>

        <div class="field">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        </div>

        <div class="field">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="field">
            <label for="agama">Agama</label>
            <input id="agama" type="text" name="agama" value="{{ old('agama') }}" placeholder="Contoh: Islam" required>
        </div>

        <div class="field">
            <label for="no_telp">No. Telepon / WhatsApp</label>
            <input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="08xxxxxxxxxx" required>
        </div>

        <div class="field">
            <label for="email">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
        </div>

        <div class="field">
            <label for="angkatan">Tahun Angkatan</label>
            <input id="angkatan" type="number" name="angkatan" value="{{ old('angkatan', date('Y')) }}" required>
        </div>

        <div class="field">
            <label for="semester">Semester</label>
            <input id="semester" type="number" name="semester" value="{{ old('semester', 1) }}" min="1" max="14" required>
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

        <div class="field full-width">
            <label for="alamat">Alamat Domisili</label>
            <textarea id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap..." required>{{ old('alamat') }}</textarea>
        </div>
    </div>

    <div class="form-actions">
        <a class="button button-secondary" href="/query-builder">Batal</a>
        <button class="button button-primary" type="submit">
            <i class="fa-solid fa-floppy-disk"></i>
            <span>Simpan Mahasiswa</span>
        </button>
    </div>
</form>
@endsection