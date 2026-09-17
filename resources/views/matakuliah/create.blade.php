@extends('layouts.header')
@section('title', 'Tambah Mata Kuliah')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('matakuliah.index') }}">&larr; Kembali ke mata kuliah</a><span class="eyebrow">DATA MATA KULIAH</span><h1>Tambah Mata Kuliah</h1><p>Isi informasi berikut untuk menambahkan mata kuliah baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="kode_mk">Kode Mata Kuliah</label><input id="kode_mk" type="text" name="kode_mk" value="{{ old('kode_mk') }}" placeholder="Contoh: IF101" required></div>
            <div class="field"><label for="nama_mk">Nama Mata Kuliah</label><input id="nama_mk" type="text" name="nama_mk" value="{{ old('nama_mk') }}" placeholder="Nama mata kuliah" required></div>
            <div class="field"><label for="sks">SKS</label><input id="sks" type="number" name="sks" value="{{ old('sks') }}" min="1" max="6" placeholder="2 - 4" required></div>
            <div class="field"><label for="semester">Semester</label><input id="semester" type="number" name="semester" value="{{ old('semester') }}" min="1" max="14" placeholder="1 - 14" required></div>
            <select name="dosen_id">
                <option value="">-- Pilih Dosen --</option>

                @foreach ($dosen as $dsn)
                    <option value="{{ $dsn->id }}">
                        {{ $dsn->nama }}
                    </option>
                @endforeach

            </select>
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('matakuliah.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Mata Kuliah</button></div>
    </form>
@endsection