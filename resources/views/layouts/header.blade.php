<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIAKAD')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="header">
        <div class="header-container">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">S</div>

                <div class="logo-text">
                    <h1>SIAKAD</h1>
                    <span>Sistem Informasi Akademik</span>
                </div>
            </a>

            <!-- Navigation -->
            <nav class="navigation">

                <a class="{{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">
                    Mahasiswa
                </a>

                <a class="{{ request()->routeIs('dosen.*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">
                    Dosen
                </a>

                <a class="{{ request()->routeIs('matakuliah.*') ? 'active' : '' }}" href="{{ route('matakuliah.index') }}">
                    Mata Kuliah
                </a>

            </nav>

        </div>
    </header>


    <!-- Isi halaman -->
    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} SIAKAD &mdash; Sistem Informasi Akademik</p>
    </footer>

</body>
</html>