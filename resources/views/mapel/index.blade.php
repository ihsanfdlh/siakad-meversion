@extends('layouts.app')

@section('judul', 'Daftar Mata Pelajaran')

@section('konten')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-book"></i> DATA AKADEMIK</span>
        <h1>Daftar Mata Pelajaran</h1>
        <p>Modul kurikulum mata pelajaran dan beban SKS perkuliahan.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a class="button button-secondary" href="{{ route('akademik.siswa.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>Ke Daftar Siswa</span>
        </a>
    </div>
</div>

<div class="table-card">
    <div class="table-top">
        <strong>Data Mata Pelajaran Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ count($mapel) }} Mapel</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Kode</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Bobot SKS</th>
                    <th style="text-align: right; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mapel as $item)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><span class="code-pill">{{ $item->kode_mk }}</span></td>
                        <td><strong>{{ $item->nama_mk }}</strong></td>
                        <td>
                            @if ($item->sks >= 3)
                                <span class="status-pill">{{ $item->sks }} SKS (Besar)</span>
                            @else
                                <span class="code-pill">{{ $item->sks }} SKS (Kecil)</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <a href="{{ route('akademik.mapel.show', $item->id) }}" class="btn-action btn-action-view">
                                <i class="fa-solid fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="5">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data mata pelajaran</strong>
                            <span>Tidak ada informasi mata pelajaran yang tersimpan saat ini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection