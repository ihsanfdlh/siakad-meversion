<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
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


    <form
        action="/mahasiswa2/simpan"
        method="POST"
    >

        @csrf


        <label>NIM</label>
        <br>

        <input
            type="text"
            name="nim"
            value="{{ old('nim') }}"
            required
        >

        <br><br>


        <label>Nama</label>
        <br>

        <input
            type="text"
            name="nama"
            value="{{ old('nama') }}"
            required
        >

        <br><br>


        <label>Tempat Lahir</label>
        <br>

        <input
            type="text"
            name="tempat_lahir"
            value="{{ old('tempat_lahir') }}"
            required
        >

        <br><br>


        <label>Tanggal Lahir</label>
        <br>

        <input
            type="date"
            name="tanggal_lahir"
            value="{{ old('tanggal_lahir') }}"
            required
        >

        <br><br>


        <label>Jenis Kelamin</label>
        <br>

        <select
            name="jenis_kelamin"
            required
        >

            <option value="">
                -- Pilih Jenis Kelamin --
            </option>

            <option
                value="Laki-laki"
                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
            >
                Laki-laki
            </option>

            <option
                value="Perempuan"
                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
            >
                Perempuan
            </option>

        </select>

        <br><br>


        <label>Agama</label>
        <br>

        <input
            type="text"
            name="agama"
            value="{{ old('agama') }}"
            required
        >

        <br><br>


        <label>Alamat</label>
        <br>

        <textarea
            name="alamat"
            required
        >{{ old('alamat') }}</textarea>

        <br><br>


        <label>No. Telp</label>
        <br>

        <input
            type="text"
            name="no_telp"
            value="{{ old('no_telp') }}"
            required
        >

        <br><br>


        <label>Email</label>
        <br>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <br><br>


        <label>Angkatan</label>
        <br>

        <input
            type="number"
            name="angkatan"
            value="{{ old('angkatan') }}"
            required
        >

        <br><br>


        <label>Semester</label>
        <br>

        <input
            type="number"
            name="semester"
            value="{{ old('semester') }}"
            required
        >

        <br><br>


        <label>Program Studi</label>
        <br>

        <select
            name="id_prodi"
            required
        >

            <option value="">
                -- Pilih Program Studi --
            </option>


            @foreach ($prodis as $prodi)

                <option
                    value="{{ $prodi->id }}"
                    {{ old('id_prodi') == $prodi->id ? 'selected' : '' }}
                >

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