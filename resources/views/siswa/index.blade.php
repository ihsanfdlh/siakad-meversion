@extends('layouts.app')

@section('judul', 'Daftar Siswa')

@section('konten')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-users"></i> DATA AKADEMIK SISWA</span>
        <h1>Daftar Siswa & Mahasiswa</h1>
        <p>Modul data siswa binaan akademik dan status perkuliahan.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a class="button button-secondary" href="{{ route('akademik.mapel.index') }}">
            <i class="fa-solid fa-book"></i>
            <span>Ke Mata Pelajaran</span>
        </a>
    </div>
</div>

<div class="table-card">
    <div class="table-top">
        <strong>Data Siswa Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ count($siswa) }} Siswa</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Status / Tingkat</th>
                    <th style="text-align: right; width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><span class="code-pill">{{ $item->nim }}</span></td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ $item->prodi }}</td>
                        <td>
                            @switch(true)
                                @case($item->semester <= 2)
                                    <span class="status-pill">Mahasiswa Baru</span>
                                    @break
                                @case($item->semester >= 7)
                                    <span class="status-pill" style="background: var(--warning-bg); color: var(--warning-text); border-color: var(--warning-border);">Tingkat Akhir</span>
                                    @break
                                @default
                                    <span class="status-pill">Mahasiswa Aktif</span>
                            @endswitch
                        </td>
                        <td style="text-align: right;">
                            <a href="{{ route('akademik.siswa.show', $item->id) }}" class="btn-action btn-action-view">
                                <i class="fa-solid fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="6">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data siswa</strong>
                            <span>Tidak ada informasi siswa yang tersimpan saat ini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection