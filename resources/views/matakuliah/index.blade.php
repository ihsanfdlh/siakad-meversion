@extends('layouts.header')
@section('title', 'Daftar Mata Kuliah')

@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow"><i class="fa-solid fa-book-open"></i> DATA AKADEMIK</span>
        <h1>Daftar Mata Kuliah</h1>
        <p>Kelola mata kuliah, bobot SKS, semester, dan dosen pengampu mata kuliah.</p>
    </div>
    <a class="button button-primary" href="{{ route('matakuliah.create') }}">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Mata Kuliah</span>
    </a>
</div>

@if (session('pesan'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('pesan') }}</span>
    </div>
@endif

<div class="table-card">
    <div class="table-top">
        <strong>Data Mata Kuliah Terdaftar</strong>
        <span class="record-count"><i class="fa-solid fa-database"></i> {{ $matkul->count() }} Mata Kuliah</span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Dosen Pengampu</th>
                    <th>Program Studi</th>
                    <th style="text-align: right; width: 230px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($matkul as $matakuliah)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td><span class="code-pill">{{ $matakuliah->kode_mk }}</span></td>
                        <td><strong>{{ $matakuliah->nama_mk }}</strong></td>
                        <td><span class="status-pill">{{ $matakuliah->sks }} SKS</span></td>
                        <td><span class="code-pill">Semester {{ $matakuliah->semester }}</span></td>
                        <td>{{ $matakuliah->dosen->nama ?? 'Belum ada dosen' }}</td>
                        <td>{{ $matakuliah->prodi->nama ?? 'Belum ada prodi' }}</td>
                        <td style="text-align: right;">
                            <div class="action-group" style="justify-content: flex-end;">
                                <a href="{{ route('matakuliah.show', $matakuliah->id) }}" class="btn-action btn-action-view" title="Detail Mata Kuliah">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn-action btn-action-edit" title="Edit Mata Kuliah">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus mata kuliah {{ $matakuliah->nama_mk }}?')"
                                    style="display: inline-block; margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-action btn-action-delete" type="submit" title="Hapus Mata Kuliah">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="8">
                            <i class="fa-solid fa-inbox" style="font-size: 38px; color: var(--text-tertiary); margin-bottom: 12px; display: block;"></i>
                            <strong>Belum ada data mata kuliah</strong>
                            <span>Tambahkan mata kuliah baru untuk mulai menyusun kurikulum perkuliahan.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection