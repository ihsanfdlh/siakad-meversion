@extends('layouts.app')

@section('judul', 'Detail Mata Pelajaran - ' . $mapel->nama_mk)

@section('konten')
<div class="section-heading">
    <div>
        <a class="back-link" href="{{ route('akademik.mapel.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali ke Daftar Mata Pelajaran</span>
        </a>
        <span class="eyebrow"><i class="fa-solid fa-book"></i> DETAIL MATA PELAJARAN</span>
        <h1>{{ $mapel->nama_mk }}</h1>
        <p>Informasi kurikulum dan beban SKS mata pelajaran.</p>
    </div>
</div>

<div class="detail-card">
    <div class="detail-header">
        <div class="detail-avatar">
            <i class="fa-solid fa-book-open"></i>
        </div>
        <div class="detail-header-info">
            <h2>{{ $mapel->nama_mk }}</h2>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: 6px;">
                <span class="code-pill">Kode: {{ $mapel->kode_mk }}</span>
                <span class="status-pill">{{ $mapel->sks }} SKS</span>
            </div>
        </div>
    </div>
    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-hashtag"></i> Kode Mata Pelajaran</span>
            <span class="detail-value">{{ $mapel->kode_mk }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-book"></i> Nama Mata Pelajaran</span>
            <span class="detail-value">{{ $mapel->nama_mk }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label"><i class="fa-solid fa-award"></i> Bobot SKS</span>
            <span class="detail-value">{{ $mapel->sks }} SKS</span>
        </div>
    </div>
</div>
@endsection