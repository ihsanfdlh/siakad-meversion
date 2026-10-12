@extends('layouts.header')
@section('title', 'Daftar Jurusan')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-building-columns"></i> DATA AKADEMIK</span>
        <h1>Daftar Jurusan</h1>
        <p>Kelola data jurusan, pimpinan fakultas/jurusan, dan program studi yang dinaungi.</p>
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <a class="button button-secondary" href="{{ route('jurusan.statistik') }}">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Statistik Jurusan</span>
        </a>
        <a class="button button-primary" href="{{ route('jurusan.create') }}">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Jurusan</span>
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data Jurusan Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $data->count() }} Jurusan</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Jurusan</th>
                    <th>Kepala Jurusan (Kajur)</th>
                    <th>Sekretaris Jurusan (Sekjur)</th>
                    <th style="text-align: right; width: 230px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $jrsn)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $jrsn->nama }}</strong>
                        </td>
                        <td>
                            @if($jrsn->kajur)
                                <span style="font-weight: 600;">{{ $jrsn->kajur->nama }}</span>
                            @else
                                <span style="color: var(--text-tertiary); font-style: italic;">Belum ditentukan</span>
                            @endif
                        </td>
                        <td>
                            @if($jrsn->sekjur)
                                <span style="font-weight: 600;">{{ $jrsn->sekjur->nama }}</span>
                            @else
                                <span style="color: var(--text-tertiary); font-style: italic;">Belum ditentukan</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <div class="action-group" style="justify-content: flex-end;">
                                <a href="{{ route('jurusan.show', $jrsn->id) }}" class="btn-action btn-action-view" title="Detail Jurusan">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('jurusan.edit', $jrsn->id) }}" class="btn-action btn-action-edit" title="Edit Jurusan">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('jurusan.destroy', $jrsn->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus jurusan {{ $jrsn->nama }}?')"
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
                        <td class="empty-state" colspan="5">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data Jurusan</strong>
                            <span>Tambahkan data jurusan baru untuk mulai mengelompokkan program studi.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection