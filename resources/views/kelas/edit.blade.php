@extends('layouts.header')

@section('title', 'TAMBAH KELAS')

@section('content')

<div class="form-heading">
    <span class="eyebrow">
        <a href="{{ route('kelas.index') }}">kelas</a>
    </span>
    <span class="eyebrow"> > Edit</span>
    <h1>Edit Kelas</h1>

    <p>Isi informasi berikut untuk menambahkan kelas baru.</p>
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

<form class="form-card" action="{{ route('kelas.update', $kelas->getKey()) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-grid">

        <div class="field">
            <label for="semester">Semester</label>

            <select id="semester" name="semester" required>
                <option value="">-- Pilih Semester --</option>

                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}"
                        {{ old('semester', $kelas->semester) == $i ? 'selected' : '' }}>
                        Semester {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="field">
            <label for="nim">Nama Kelas</label>
            <input
                id="nama_kelas"
                type="text"
                name="nama_kelas"
                value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                placeholder="Contoh: A, B, C, D, E"
                required
            >
        </div>

        <div class="field">
            <label for="nama">Angkatan</label>
            <input
                id="angkatan"
                type="text"
                name="angkatan"
                value="{{ old('angkatan', $kelas->angkatan) }}"
                placeholder="Contoh: 2025"
                required
            >
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