@extends('layouts.header')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="form-heading">
    <a class="back-link" href="{{ route('mahasiswa.index') }}">
        &larr; Kembali ke mahasiswa
    </a>

    <span class="eyebrow">DATA MAHASISWA</span>

    <h1>Tambah Mahasiswa</h1>

    <p>Isi informasi berikut untuk menambahkan mahasiswa baru.</p>
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

<form class="form-card" action="{{ route('mahasiswa.store') }}" method="POST">

    @csrf

    <div class="form-grid">

        <div class="field">
            <label for="nim">NIM</label>
            <input
                id="nim"
                type="text"
                name="nim"
                value="{{ old('nim') }}"
                placeholder="Contoh: 2301001"
                required
            >
        </div>

        <div class="field">
            <label for="nama">Nama Mahasiswa</label>
            <input
                id="nama"
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Nama lengkap"
                required
            >
        </div>

        <div class="field">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input
                id="tempat_lahir"
                type="text"
                name="tempat_lahir"
                value="{{ old('tempat_lahir') }}"
                placeholder="Tempat lahir"
                required
            >
        </div>

        <div class="field">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input
                id="tanggal_lahir"
                type="date"
                name="tanggal_lahir"
                value="{{ old('tanggal_lahir') }}"
                required
            >
        </div>

        <div class="field">
            <label for="jenis_kelamin">Jenis Kelamin</label>

            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">-- Jenis Kelamin --</option>

                <option value="Laki-laki"
                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="Perempuan"
                    {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div class="field">
            <label for="agama">Agama</label>

            <input
                id="agama"
                type="text"
                name="agama"
                value="{{ old('agama') }}"
                placeholder="Agama"
                required
            >
        </div>

        <div class="field">
            <label for="alamat">Alamat Domisili</label>

            <input
                id="alamat"
                type="text"
                name="alamat"
                value="{{ old('alamat') }}"
                placeholder="Alamat"
                required
            >
        </div>

        <div class="field">
            <label for="no_telp">No Telepon</label>

            <input
                id="no_telp"
                type="tel"
                name="no_telp"
                value="{{ old('no_telp') }}"
                placeholder="Contoh: 081234567890"
                required
            >
        </div>

        <div class="field">
            <label for="email">Email</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="contoh@gmail.com"
                required
            >
        </div>

        <div class="field">
            <label for="angkatan">Angkatan</label>

            <input
                id="angkatan"
                type="number"
                name="angkatan"
                value="{{ old('angkatan') }}"
                placeholder="Tahun masuk"
                required
            >
        </div>

        <div class="field">
            <label for="semester">Semester</label>

            <select id="semester" name="semester" required>
                <option value="">-- Pilih Semester --</option>

                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}"
                        {{ old('semester') == $i ? 'selected' : '' }}>
                        Semester {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="field">
            <label for="id_prodi">Program Studi</label>

            <select id="id_prodi" name="id_prodi" required>
                <option value="">-- Pilih Program Studi --</option>

                @foreach ($prodi as $item)
                    <option
                        value="{{ $item->id }}"
                        {{ old('id_prodi') == $item->id ? 'selected' : '' }}
                    >
                        {{ $item->nama }} ({{ $item->jenjang }})
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="form-actions">
        <a
            class="button button-secondary"
            href="{{ route('mahasiswa.index') }}"
        >
            Batal
        </a>

        <button
            class="button button-primary"
            type="submit"
        >
            Simpan Mahasiswa
        </button>
    </div>

</form>

@endsection