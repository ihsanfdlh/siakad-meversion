@extends('layouts.header')

@section('title', 'Beranda')

@section('content')
<section class="hero">
    <div class="hero-copy">
        <span class="eyebrow">PORTAL AKADEMIK</span>
        <h1>Kelola data akademik dengan lebih <span>mudah.</span></h1>
        <p>Selamat datang di SIAKAD. Akses data mahasiswa, dosen, dan mata kuliah dari satu tempat yang rapi.</p>
        <a class="button button-primary" href="{{ route('mahasiswa.index') }}">Lihat Data Akademik <span aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="hero-art" aria-hidden="true">
        <div class="art-circle"></div>
        <div class="art-card art-card-main"><span class="art-icon">✦</span><strong>Data terorganisir</strong><small>Semua informasi dalam satu sistem</small></div>
        <div class="art-card art-card-small"><strong>+24%</strong><small>Efisiensi pengelolaan</small></div>
    </div>
</section>

<section class="stats-grid" aria-label="Ringkasan data akademik">
    <a class="stat-card" href="{{ route('mahasiswa.index') }}">
        <span class="stat-icon icon-blue">♙</span>
        <span class="stat-label">Mahasiswa</span>
        <strong>{{ number_format($counts['mahasiswa']) }}</strong>
        <span class="stat-link">Lihat data &rarr;</span>
    </a>
    <a class="stat-card" href="{{ route('dosen.index') }}">
        <span class="stat-icon icon-purple">♧</span>
        <span class="stat-label">Dosen</span>
        <strong>{{ number_format($counts['dosen']) }}</strong>
        <span class="stat-link">Lihat data &rarr;</span>
    </a>
    <a class="stat-card" href="{{ route('matakuliah.index') }}">
        <span class="stat-icon icon-orange">▦</span>
        <span class="stat-label">Mata Kuliah</span>
        <strong>{{ number_format($counts['matakuliah']) }}</strong>
        <span class="stat-link">Lihat data &rarr;</span>
    </a>
    <a class="stat-card" href="{{ route('ruang.index') }}">
        <span class="stat-icon icon-green">⌂</span>
        <span class="stat-label">Ruangan</span>
        <strong>{{ number_format($counts['ruang']) }}</strong>
        <span class="stat-link">Lihat data &rarr;</span>
    </a>
</section>

<section class="section-heading home-heading">
    <div><span class="eyebrow">FITUR UTAMA</span><h2>Semua yang Anda butuhkan</h2></div>
</section>
<div class="feature-grid">
    <a class="feature-card" href="{{ route('mahasiswa.index') }}"><span class="feature-icon icon-blue">♙</span><h3>Mahasiswa</h3><p>Kelola identitas dan informasi akademik mahasiswa.</p><span class="feature-link">Kelola data &rarr;</span></a>
    <a class="feature-card" href="{{ route('dosen.index') }}"><span class="feature-icon icon-purple">♧</span><h3>Dosen</h3><p>Perbarui data dosen dan informasi kontak dengan mudah.</p><span class="feature-link">Kelola data &rarr;</span></a>
    <a class="feature-card" href="{{ route('matakuliah.index') }}"><span class="feature-icon icon-orange">▦</span><h3>Mata Kuliah</h3><p>Atur daftar mata kuliah, SKS, dan semester perkuliahan.</p><span class="feature-link">Kelola data &rarr;</span></a>
</div>
@endsection