@extends('layouts.header')
@section('title', 'Tambah Mahasiswa')
@section('content')
<div class="form-heading"><a class="back-link" href="{{ route('mahasiswa.index') }}">&larr; Kembali ke mahasiswa</a><span class="eyebrow">DATA MAHASISWA</span><h1>Tambah Mahasiswa</h1><p>Isi informasi berikut untuk menambahkan mahasiswa baru.</p></div>
@if ($errors->any())<div class="alert alert-error"><strong>Periksa kembali data Anda:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form class="form-card" action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="field"><label for="nim">NIM</label><input id="nim" type="text" name="nim" value="{{ old('nim') }}" placeholder="Contoh: 2301001" required></div>
            <div class="field"><label for="nama">Nama Mahasiswa</label><input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap" required></div>
            <div class="field"><label for="no_telp">No Telepone</label><input id="no_telp" type="tel" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 081234567890" required></div>
            <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="xyzbcaa@gmail.com" required></div>
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
        </div>
        <div class="form-actions"><a class="button button-secondary" href="{{ route('mahasiswa.index') }}">Batal</a><button class="button button-primary" type="submit">Simpan Mahasiswa</button></div>
    </form>
@endsection