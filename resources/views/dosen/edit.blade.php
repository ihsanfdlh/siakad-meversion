@extends('layouts.header')
@section('title', 'UPDATE - '. $dosen->nama)
@section('content')
<div class="form-heading">
    <a class="back-link" href="{{ route('dosen.index') }}">&larr; Kembali ke dosen</a>
    <span class="eyebrow">UPDATE DATA DOSEN</span>
    <h1>Update {{ $dosen->nama }}</h1>
    <p>Perbarui data Dosen.</p>
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
    action="{{ route('dosen.update', $dosen->getKey()) }}"
    method="POST">

    @csrf
    @method('PUT')

        <div class="form-grid">
            <div class="field">
                <label for="nip">NIP</label>
                <input id="nip" type="text" name="nip" value="{{ old('nip', $dosen->nip) }}" placeholder="NIP" required>
            </div>
            <div class="field">
                <label for="nama">Nama Dosen</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" placeholder="Nama lengkap" required>
            </div>
            <div class="field">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}" placeholder="Tempat lahir" required>
            </div>
            <div class="field">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}" placeholder="Tanggal lahir" required>
            </div>
            <div class="field">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">-- Jenis Kelamin --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $dosen->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $dosen->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                </select>
            </div>
            <div class="field">
                <label for="agama">Agama</label>
                <input id="agama" type="text" name="agama" value="{{ old('agama', $dosen->agama) }}" placeholder="Agama" required>
            </div>
            <div class="field">
                <label for="alamat">Alamat</label>
                <input id="alamat" type="text" name="alamat" value="{{ old('alamat', $dosen->alamat) }}" placeholder="Alamat" required>
            </div>
            <div class="field">
                <label for="no_telp">Nomor Telepon</label>
                <input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp', $dosen->no_telp) }}" placeholder="08xxxxxxxxxx" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $dosen->email) }}" placeholder="nama@kampus.ac.id" required>
            </div>
            <div class="field">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <select id="pendidikan_terakhir" name="pendidikan_terakhir">
                    <option value="">-- Pendidikan Terakhir --</option>
                        <option value="S2"
                    {{ old('pendidikan_terakhir', $dosen->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>
                    S2
                </option>

                <option value="S3"
                    {{ old('pendidikan_terakhir', $dosen->pendidikan_terakhir) == 'S3' ? 'selected' : '' }}>
                    S3
                </option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <a class="button button-secondary" href="{{ route('dosen.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection