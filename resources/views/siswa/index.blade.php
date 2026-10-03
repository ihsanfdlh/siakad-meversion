@extends('layouts.app')

@section('judul', 'Daftar Mahasiswa')
@section('konten')
    <h1>Daftar Siswa</h1>
    <a href="{{ route('akademik.mapel.index') }}">Ke Daftar Mata Pelajaran</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $siswa)
            <tr style="background-color: {{ $loop->even ? '#f2f2f2' : '#ffffff' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nim }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->prodi }}</td>
                <td>
                    @switch(true)
                        @case($siswa->semester <= 2)
                            <span>Mahasiswa Baru</span>
                            @break
                        @case($siswa->semester >= 7)
                            <span>Tingkat Akhir</span>
                            @break
                        @default
                            <span>Mahasiswa Aktif</span>
                    @endswitch
                </td>
                <td><a href="{{ route('akademik.siswa.show', $siswa->id) }}">Lihat Detail</a></td>
            </tr>
            @empty
                <tr><td colspan="6">Belum ada data mahasiswa.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection