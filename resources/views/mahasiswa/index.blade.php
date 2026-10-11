@extends('layouts.header')
@section('title', 'MAHASISWA')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow">DATA AKADEMIK</span>
        <h1>Daftar Mahasiswa</h1>
        <p>Kelola informasi mahasiswa yang terdaftar di sistem.</p>
    </div>
    <a class="button button-primary" href="{{ route('mahasiswa.create') }}">
        + Tambah Mahasiswa
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data mahasiswa</strong>
        <span class="record-count">{{ $mahasiswa->total() }} data</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Prodi</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td class="muted">{{ $mahasiswa->firstItem() + $loop->index }}</td>
                        <td><span class="code-pill">{{ $mhs->nim }}</span></td>
                        <td><strong>{{ $mhs->nama }}</strong></td>
                        <td><span class="status-pill">{{ $mhs->semester }}</span></td>
                        <td>{{ $mhs->prodi->nama ?? '-' }}</td>
                        <td>
                            <span class="code-pill">
                                <a href="{{ route('mahasiswa.show', $mhs->id_mahasiswa) }}" style="text-decoration: none;">Lihat Detail</a>
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $mhs->id_mahasiswa) }}" class="status-pill" style="text-decoration: none;">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id_mahasiswa) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button  class="code-pill" type="submit" style="border: none; cursor:pointer; background-color: #ffebed; color: #ff263b">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="9">
                            <strong>Belum ada data mahasiswa</strong>
                            <span>
                                Tambahkan mahasiswa pertama untuk mulai mengelola data.
                            </span>
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
            <strong>{{ $mahasiswa->total() }}</strong> data
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
