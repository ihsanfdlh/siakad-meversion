```blade
<!DOCTYPE html>
<html>

<head>
    <title>Statistik Prodi</title>
</head>

<body>

    <h2>
        Statistik Jumlah Mahasiswa per Prodi
    </h2>


    <p>
        <a href="/query-builder">
            Kembali ke Data Mahasiswa
        </a>
    </p>


    <table border="1" cellpadding="8">

        <tr>
            <th>No</th>
            <th>Program Studi</th>
            <th>Jenjang</th>
            <th>Jumlah Mahasiswa</th>
        </tr>


        @forelse ($rekap as $index => $item)

            <tr>

                <td>
                    {{ $index + 1 }}
                </td>

                <td>
                    {{ $item->nama }}
                </td>

                <td>
                    {{ $item->jenjang }}
                </td>

                <td>
                    {{ $item->jumlah }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4">
                    Data tidak ditemukan.
                </td>

            </tr>

        @endforelse

    </table>

</body>

</html>
```
