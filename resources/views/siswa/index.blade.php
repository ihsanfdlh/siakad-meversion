<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Siswa</title>
</head>
<body>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nim }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->prodi }}</td>
                <td>{{ $siswa->semester }}</td>
                <td><a href="{{ route('akademik.siswa.show', $siswa->id) }}">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
