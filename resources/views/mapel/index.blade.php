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
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $index => $mapel)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mapel->kode_mk }}</td>
                <td>{{ $mapel->nama_mk }}</td>
                <td><a href="{{ route('akademik.mapel.show', $mapel->id) }}">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
