<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Pelajaran</title>
</head>
<body>
    <h1>Daftar Mata Pelajaran</h1>
    <a href="{{ route('akademik.siswa.index') }}">Ke Daftar Siswa</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mapel as $mapel)
            <tr style="background-color: {{ $loop->even ? '#abb6ff' : '#e0e4ff' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mapel->kode_mk }}</td>
                <td>{{ $mapel->nama_mk }}</td>
                <td>
                    @switch(true)
                        @case($mapel->sks >= 3)
                            <span><strong>SKS Besar</strong></span>
                            @break
                        @default
                            <span>SKS Kecil</span>
                    @endswitch
                </td>
                <td><a href="{{ route('akademik.mapel.show', $mapel->id) }}">Lihat Detail</a></td>
            </tr>
            @empty
                <tr><td colspan="6">Belum ada data mata pelajaran.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
