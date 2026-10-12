@extends('layouts.header')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-copy">
        <span class="eyebrow">
            <span class="pulse-dot"></span>
            PORTAL AKADEMIK TERPADU
        </span>
        <h1>Kelola data akademik kampus dengan lebih <span>modern & rapi.</span></h1>
        <p>Selamat datang di SIAKAD. Solusi cerdas terintegrasi untuk mengelola mahasiswa, dosen, kurikulum, serta fasilitas ruang perkuliahan dalam satu platform.</p>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <a class="button button-primary" href="{{ route('mahasiswa.index') }}">
                <span>Kelola Data Mahasiswa</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a class="button button-secondary" href="{{ route('jurusan.statistik') }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Lihat Statistik</span>
            </a>
        </div>
    </div>
    
    <div class="hero-art" aria-hidden="true">
        <div class="art-circle"></div>
        <div class="art-card art-card-main">
            <span class="art-icon"><i class="fa-solid fa-database"></i></span>
            <strong>Data Terpusat</strong>
            <small>Sinkronisasi data real-time antar fakultas & prodi</small>
        </div>
        <div class="art-card art-card-small">
            <span style="font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Efisiensi</span>
            <strong>+98%</strong>
            <small>Akses cepat & akurat</small>
        </div>
    </div>
</section>

<!-- Stats Grid -->
<section class="stats-grid" aria-label="Ringkasan data akademik">
    <a class="stat-card" href="{{ route('mahasiswa.index') }}">
        <span class="stat-icon icon-blue">
            <i class="fa-solid fa-user-graduate"></i>
        </span>
        <span class="stat-label">Total Mahasiswa</span>
        <strong>{{ number_format($counts['mahasiswa']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="stat-card" href="{{ route('dosen.index') }}">
        <span class="stat-icon icon-purple">
            <i class="fa-solid fa-chalkboard-user"></i>
        </span>
        <span class="stat-label">Tenaga Pengajar / Dosen</span>
        <strong>{{ number_format($counts['dosen']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="stat-card" href="{{ route('jurusan.index') }}">
        <span class="stat-icon icon-cyan">
            <i class="fa-solid fa-building-columns"></i>
        </span>
        <span class="stat-label">Jurusan</span>
        <strong>{{ number_format($counts['jurusan']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="stat-card" href="{{ route('prodi.index') }}">
        <span class="stat-icon icon-green">
            <i class="fa-solid fa-layer-group"></i>
        </span>
        <span class="stat-label">Program Studi</span>
        <strong>{{ number_format($counts['prodi']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="stat-card" href="{{ route('matakuliah.index') }}">
        <span class="stat-icon icon-orange">
            <i class="fa-solid fa-book-open"></i>
        </span>
        <span class="stat-label">Mata Kuliah</span>
        <strong>{{ number_format($counts['matakuliah']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="stat-card" href="{{ route('ruang.index') }}">
        <span class="stat-icon icon-green">
            <i class="fa-solid fa-door-open"></i>
        </span>
        <span class="stat-label">Ruang Perkuliahan</span>
        <strong>{{ number_format($counts['ruang']) }}</strong>
        <span class="stat-link">Lihat data <i class="fa-solid fa-arrow-right"></i></span>
    </a>
</section>

<!-- Features Section -->
<section class="section-heading home-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-cubes"></i> MODUL APLIKASI</span>
        <h2>Kelola Seluruh Entitas Akademik</h2>
        <p>Akses cepat ke setiap modul operasional dengan kontrol data yang lengkap dan mudah dipahami.</p>
    </div>
</section>

<div class="feature-grid">
    <a class="feature-card" href="{{ route('mahasiswa.index') }}">
        <span class="feature-icon icon-blue"><i class="fa-solid fa-user-graduate"></i></span>
        <h3>Data Mahasiswa</h3>
        <p>Pencatatan biodata lengkap mahasiswa, riwayat semester, program studi, dan nilai akademik.</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="feature-card" href="{{ route('dosen.index') }}">
        <span class="feature-icon icon-purple"><i class="fa-solid fa-chalkboard-user"></i></span>
        <h3>Data Dosen</h3>
        <p>Manajemen dosen pengajar, NIP, informasi kontak, dan pengampu mata kuliah.</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="feature-card" href="{{ route('jurusan.index') }}">
        <span class="feature-icon icon-cyan"><i class="fa-solid fa-building-columns"></i></span>
        <h3>Data Jurusan</h3>
        <p>Struktur jurusan, penunjukan Kepala Jurusan (Kajur), dan Sekretaris Jurusan (Sekjur).</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="feature-card" href="{{ route('prodi.index') }}">
        <span class="feature-icon icon-green"><i class="fa-solid fa-layer-group"></i></span>
        <h3>Program Studi</h3>
        <p>Pengelompokan jenjang pendidikan (D3/D4/S1) dan integrasi program studi per jurusan.</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="feature-card" href="{{ route('matakuliah.index') }}">
        <span class="feature-icon icon-orange"><i class="fa-solid fa-book-open"></i></span>
        <h3>Mata Kuliah & Kurikulum</h3>
        <p>Pengaturan kurikulum semester, alokasi bobot SKS, kode mata kuliah, dan dosen penanggung jawab.</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>

    <a class="feature-card" href="{{ route('ruang.index') }}">
        <span class="feature-icon icon-green"><i class="fa-solid fa-door-open"></i></span>
        <h3>Ruangan & Fasilitas</h3>
        <p>Pemantauan ruang kelas, gedung, lantai, dan kapasitas daya tampung belajar mahasiswa.</p>
        <span class="feature-link">Buka modul <i class="fa-solid fa-arrow-right"></i></span>
    </a>
</div>
@endsection