@extends('layouts.header')

@section('title', 'Statistik Prodi')

@section('content')
<body>
    <div class="section-heading">
        <div>
            <a class="back-link" href="{{ route('jurusan.index') }}">&larr; Kembali ke jurusan</a>
            <span class="eyebrow">DATA AKADEMIK</span>
            <h1>Statistik Jurusan</h1>
            <p>Statistik Jurusan berdasarkan jumlah program studi.</p>
        </div>
    </div>
    @if (session('pesan'))<div class="alert alert-success">{{ session('pesan') }}</div>@endif
    <div class="table-card">
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jurusan</th>
                        <th>Jumlah Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekap as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
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