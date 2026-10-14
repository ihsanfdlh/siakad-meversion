@extends('layouts.header')
@section('title', 'Daftar Dosen')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-chalkboard-user"></i> DATA AKADEMIK</span>
        <h1>Daftar Dosen Pengajar</h1>
        <p>Kelola data pendidik, Nomor Induk Pegawai (NIP), dan kontak dosen di lingkungan kampus.</p>
    </div>
    <a class="button button-primary" href="{{ route('dosen.create') }}">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Dosen</span>
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
        <strong>Data Dosen Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $dosen->total() }} Dosen</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>No. Telepon</th>
                    <th class="action-cell" style="width: 230px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosen as $dsn)
                    <tr>
                        <td class="muted">{{ $dosen->firstItem() + $loop->index }}</td>
                        <td><span class="code-pill">{{ $dsn->nip }}</span></td>
                        <td><strong>{{ $dsn->nama }}</strong></td>
                        <td>{{ $dsn->no_telp ?? '-' }}</td>
                        <td class="action-cell">
                            <div class="action-group">
                                <a href="{{ route('dosen.show', $dsn->id) }}" class="btn-action btn-action-view" title="Detail Dosen">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn-action btn-action-edit" title="Edit Dosen">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('dosen.destroy', $dsn->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus dosen {{ $dsn->nama }}?')"
                                    style="display: inline-block; margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action btn-action-delete" type="submit" title="Hapus Dosen">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="5">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data dosen</strong>
                            <span>Tambahkan data dosen pengajar untuk mulai mengelola informasi pengampu mata kuliah.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        <p class="pagination-summary">
            Menampilkan {{ $dosen->firstItem() ?? 0 }}
            sampai {{ $dosen->lastItem() ?? 0 }} dari
            <strong>{{ $dosen->total() }}</strong> dosen
        </p>

        @if ($dosen->hasPages())
            @php
                $currentPage = $dosen->currentPage();
                $lastPage = $dosen->lastPage();
                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            @endphp

            <nav class="pagination-nav" aria-label="Navigasi halaman dosen">
                @if ($dosen->onFirstPage())
                    <span class="pagination-control is-disabled" aria-disabled="true" aria-label="Halaman sebelumnya">
                        &lsaquo;
                    </span>
                @else
                    <a class="pagination-control" href="{{ $dosen->previousPageUrl() }}" rel="prev" aria-label="Halaman sebelumnya">
                        &lsaquo;
                    </a>
                @endif

                <div class="pagination-pages">
                    @if ($startPage > 1)
                        <a class="pagination-link" href="{{ $dosen->url(1) }}">1</a>
                        @if ($startPage > 2)
                            <span class="pagination-ellipsis" aria-hidden="true">&hellip;</span>
                        @endif
                    @endif

                    @foreach ($dosen->getUrlRange($startPage, $endPage) as $page => $url)
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
                        <a class="pagination-link" href="{{ $dosen->url($lastPage) }}">{{ $lastPage }}</a>
                    @endif
                </div>

                @if ($dosen->hasMorePages())
                    <a class="pagination-control" href="{{ $dosen->nextPageUrl() }}" rel="next" aria-label="Halaman berikutnya">
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