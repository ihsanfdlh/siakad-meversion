<!DOCTYPE html>
<html lang="id">
<head><title>Detail Mata Pelajaran</title></head>
<body>
    <h1>Detail Mata Pelajaran</h1>
    <p><strong>Kode:</strong> {{ $mapel->kode_mk }}</p>
    <p><strong>Nama:</strong> {{ $mapel->nama_mk }}</p>
    <a href="{{ route('akademik.mapel.index') }}">&laquo; Kembali ke Daftar</a>
</body>
</html>
