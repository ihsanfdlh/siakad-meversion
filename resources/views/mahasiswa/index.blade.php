@extends('layouts.header')
@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-user-graduate"></i> DATA AKADEMIK</span>
        <h1>Daftar Mahasiswa</h1>
        <p>Kelola data identitas, semester, dan program studi mahasiswa aktif yang terdaftar di sistem.</p>
    </div>
    <a class="button button-primary" href="{{ route('mahasiswa.create') }}">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Mahasiswa</span>
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data Mahasiswa Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $mahasiswa->total() }} Mahasiswa</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>Program Studi</th>
                    <th>Kelas</th>
                    <th class="action-cell" style="width: 230px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td class="muted">{{ $mahasiswa->firstItem() + $loop->index }}</td>
                        <td><span class="code-pill">{{ $mhs->nim }}</span></td>
                        <td><strong>{{ $mhs->nama }}</strong></td>
                        <td><span class="status-pill">Semester {{ $mhs->semester }}</span></td>
                        <td><span>{{ $mhs->prodi->nama ?? '-' }}</span></td>
                        <td><span class="status-pill">{{ collect(preg_split('/\s+/', trim($mhs->prodi->nama)))->map(fn($kata) => strtoupper(substr($kata, 0, 1)))->implode('') }}-{{ $mhs->kelas?->semester ?? '-'}}{{ $mhs->kelas?->nama_kelas ?? '-'}}</span></td>
                        <td class="action-cell">
                            <div class="action-group">
                                <a href="{{ route('mahasiswa.show', $mhs->id_mahasiswa) }}" class="btn-action btn-action-view" title="Lihat Biodata">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('mahasiswa.edit', $mhs->id_mahasiswa) }}" class="btn-action btn-action-edit" title="Ubah Data">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mhs->id_mahasiswa) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data {{ $mhs->nama }}?')"
                                    style="display: inline-block; margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action btn-action-delete" type="submit" title="Hapus Data">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="6">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data mahasiswa</strong>
                            <span>Tambahkan data mahasiswa baru untuk mulai mengelola informasi akademik.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        <p class="pagination-summary">
            Menampilkan {{ $mahasiswa->firstItem() ?? 0 }}
            sampai {{ $mahasiswa->lastItem() ?? 0 }} dari
            <strong>{{ $mahasiswa->total() }}</strong> mahasiswa
        </p>

        @if ($mahasiswa->hasPages())
            @php
                $currentPage = $mahasiswa->currentPage();
                $lastPage = $mahasiswa->lastPage();
                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            @endphp

            <nav class="pagination-nav" aria-label="Navigasi halaman mahasiswa">
                @if ($mahasiswa->onFirstPage())
                    <span class="pagination-control is-disabled" aria-disabled="true" aria-label="Halaman sebelumnya">
                        &lsaquo;
                    </span>
                @else
                    <a class="pagination-control" href="{{ $mahasiswa->previousPageUrl() }}" rel="prev" aria-label="Halaman sebelumnya">
                        &lsaquo;
                    </a>
                @endif

                <div class="pagination-pages">
                    @if ($startPage > 1)
                        <a class="pagination-link" href="{{ $mahasiswa->url(1) }}">1</a>
                        @if ($startPage > 2)
                            <span class="pagination-ellipsis" aria-hidden="true">&hellip;</span>
                        @endif
                    @endif

                    @foreach ($mahasiswa->getUrlRange($startPage, $endPage) as $page => $url)
                        @if ($page === $currentPage)
                            <span class="pagination-link is-current" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <span class="pagination-ellipsis" aria-hidden="true">&hellip;</span>
                        @endif
                        <a class="pagination-link" href="{{ $mahasiswa->url($lastPage) }}">{{ $lastPage }}</a>
                    @endif
                </div>

                @if ($mahasiswa->hasMorePages())
                    <a class="pagination-control" href="{{ $mahasiswa->nextPageUrl() }}" rel="next" aria-label="Halaman berikutnya">
                        &rsaquo;
                    </a>
                @else
                    <span class="pagination-control is-disabled" aria-disabled="true" aria-label="Halaman berikutnya">
                        &rsaquo;
                    </span>
                @endif
            </nav>
        @endif
    </div>
</div>
@endsection
