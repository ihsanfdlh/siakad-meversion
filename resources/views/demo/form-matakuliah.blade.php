<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div>
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/matakuliah2/simpan" method="POST">
        @csrf
        <label>NIM</label>
        <br>
        <input type="text" name="nim" value="{{ old('nim') }}" required>
        <br><br>
        <select name="id_prodi" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ old('id_prodi') == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama }}
                    -
                    {{ $prodi->jenjang }}
                </option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">
            Simpan
        </button>
        <a href="/query-builder">
            Kembali
        </a>
    </form>
</body>
</html>