@extends('layouts.header')
@section('title', 'Tambah Mahasiswa')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('mahasiswa.index') }}">&larr; Kembali ke mahasiswa</a><span class="eyebrow">DATA MAHASISWA</span><h1>Tambah Mahasiswa</h1><p>Isi informasi berikut untuk menambahkan mahasiswa baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field">
                <label for="nim">NIM</label>
                <input id="nim" type="text" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 2301001" required>
            </div>
            <div class="field">
                <label for="nama">Nama Mahasiswa</label>
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
                <label for="no_telp">No Telepone</label>
                <input id="no_telp" type="tel" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 081234567890" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="xyzbcaa@gmail.com" required>
            </div>
            <div class="field">
                <label for="angkatan">Angkatan</label>
                <input id="angkatan" type="number" name="angkatan" value="{{ old('angkatan') }}" placeholder="Tahun masuk" required>
            </div>
            <div class="field">
                <label for="semester">Semester</label>
                <select id="semester" name="semester">
                    <option value="">-- Pilih Semester --</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                        <option value="9">Semester 9</option>
                        <option value="10">Semester 0</option>
                        <option value="11">Semester 11</option>
                        <option value="12">Semester 12</option>
                        <option value="13">Semester 13</option>
                        <option value="14">Semester 14</option>
                </select>
            </div>
            <div class="field">
                <label for="status_mhs">Status Mahasiswa</label>
                <select id="status_mhs" name="status_mhs">
                    <option value="">-- Status Mahasiswa --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Non Aktif">Non Aktif</option>
                        <option value="Drop Out">Drop Out</option>
                </select>
            </div>
            <div class="field">
                <label for="id_prodi">Program Studi</label>
                <select id="id_prodi" name="id_prodi">
                    <option value="">-- Pilih Program Studi --</option>

                    @foreach ($prodi as $prodi)
                        <option value="{{ $prodi->id }}">
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('mahasiswa.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Mahasiswa</button></div>
    </form>
@endsection