@extends('layouts.header')

@section('title', 'Statistik Prodi')

@section('content')
<body>
    <div class="section-heading">
        <div>
            <a class="back-link" href="{{ route('prodi.index') }}">&larr; Kembali ke program studi</a>
            <span class="eyebrow">DATA AKADEMIK</span>
            <h1>Statistik Program Studi</h1>
            <p>Statistik Program Studi berdasarkan jumlah mahasiswa.</p>
        </div>
        <a class="button button-primary" href="{{ route('matakuliah.create') }}">+ Tambah Mata Kuliah</a>
    </div>
    @if (session('pesan'))<div class="alert alert-success">{{ session('pesan') }}</div>@endif
    <div class="table-card">
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Jenjang</th>
                        <th>Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekap as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenjang }}</td>
                            <td>{{ $item->jumlah }} Orang</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection