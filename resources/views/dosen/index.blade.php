@extends('layouts.header')
@section('title', 'DOSEN')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow">DATA AKADEMIK</span>
        <h1>Daftar Dosen</h1>
        <p>Kelola informasi dosen yang terdaftar di sistem.</p>
    </div>
    <a class="button button-primary" href="{{ route('dosen.create') }}">+ Tambah Dosen</a>
</div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-card">
    <div class="table-top"><strong>Data Dosen</strong><span class="record-count">{{ $dosen->total() }} data</span></div>
    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>No Telepone</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($dosen as $dsn)
                <tr>
                    <td class="muted">{{ $dosen->firstItem() + $loop->index }}</td>
                    <td><span class="code-pill">{{ $dsn->nip }}</span></td>
                    <td><strong>{{ $dsn->nama }}</strong></td>
                    <td>{{ $dsn->no_telp }}</td>
                    <td><span class="code-pill""><a href="{{ route('dosen.show', $dsn->id) }}" style="text-decoration: none;">Lihat Detail</a></span></td>
                    <td>
                        <a href="{{ route('dosen.edit', $dsn->id) }}" class="status-pill" style="text-decoration: none">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('dosen.destroy', $dsn->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button  class="code-pill" type="submit" style="border: none; cursor:pointer; background-color: #ffebed; color: #ff263b">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="empty-state" colspan="11"><strong>Belum ada data mahasiswa</strong><span>Tambahkan mahasiswa pertama untuk mulai mengelola data.</span></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination-wrapper">
        <p class="pagination-summary">
            Menampilkan {{ $dosen->firstItem() ?? 0 }}
            sampai {{ $dosen->lastItem() ?? 0 }} dari
            <strong>{{ $dosen->total() }}</strong> data
        </p>

        @if ($dosen->hasPages())
            @php
                $currentPage = $dosen->currentPage();
                $lastPage = $dosen->lastPage();
                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            @endphp

            <nav class="pagination-nav" aria-label="Navigasi halaman mahasiswa">
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