```blade
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>

<body>

    <h2>Data Mahasiswa</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <p>
            {{ session('error') }}
        </p>
    @endif


    <p>
        <a href="/mahasiswa2/tambah">
            Tambah Mahasiswa
        </a>

        |

        <a href="/query-builder/filter">
            Filter Semester >= 3
        </a>

        |

        <a href="/statistik-prodi">
            Statistik Prodi
        </a>
    </p>


    <table border="1" cellpadding="8">

        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Semester</th>
            <th>ID Prodi</th>
            <th>Aksi</th>
        </tr>


        @forelse ($data as $mahasiswa)

            <tr>

                <td>
                    {{ $mahasiswa->id_mahasiswa }}
                </td>

                <td>
                    {{ $mahasiswa->nim }}
                </td>

                <td>
                    {{ $mahasiswa->nama }}
                </td>

                <td>
                    {{ $mahasiswa->semester }}
                </td>

                <td>
                    {{ $mahasiswa->id_prodi }}
                </td>

                <td>

                    <a href="/mahasiswa2/update/{{ $mahasiswa->id_mahasiswa }}">
                        Update
                    </a>

                    |

                    <a
                        href="/mahasiswa2/delete/{{ $mahasiswa->id_mahasiswa }}"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                    >
                        Delete
                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6">
                    Data mahasiswa tidak ditemukan.
                </td>

            </tr>

        @endforelse

    </table>

</body>
</html>
```
