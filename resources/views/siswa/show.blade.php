<!DOCTYPE html>
<html lang="id">
<head><title>Detail Siswa</title></head>
<body>
    <h1>Detail siswa</h1>
    <p><strong>NIM:</strong> {{ $siswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Program Studi:</strong> {{ $siswa->prodi }}</p>
    <p><strong>Semester:</strong> {{ $siswa->semester }}</p>
    <a href="{{ route('akademik.siswa.index') }}">&laquo; Kembali ke Daftar</a>
</body>
</html>
