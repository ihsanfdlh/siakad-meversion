<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Aplikasi Akademik') &mdash; SIAKAD</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Anti-flicker Theme Script -->
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('siakad-theme');
                const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                const activeTheme = savedTheme ? savedTheme : (systemPrefersDark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', activeTheme);
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">S</div>
                <div class="logo-text">
                    <h1>SIAKAD</h1>
                    <span>Sistem Informasi Akademik</span>
                </div>
            </a>

            <nav class="navigation">
                <a href="{{ url('/') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home Utama</span>
                </a>
                <a class="{{ request()->routeIs('akademik.siswa.*') ? 'active' : '' }}" href="{{ route('akademik.siswa.index') }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Siswa</span>
                </a>
                <a class="{{ request()->routeIs('akademik.mapel.*') ? 'active' : '' }}" href="{{ route('akademik.mapel.index') }}">
                    <i class="fa-solid fa-book"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </nav>

            <div class="header-actions">
                <button type="button" id="theme-toggle" class="theme-toggle-btn" aria-label="Ganti mode tampilan (Dark/Light)" title="Ganti mode tema">
                    <span class="theme-toggle-track">
                        <span class="theme-toggle-thumb">
                            <i class="fa-solid fa-sun icon-sun" aria-hidden="true"></i>
                            <i class="fa-solid fa-moon icon-moon" aria-hidden="true"></i>
                        </span>
                    </span>
                    <span class="theme-toggle-text" id="theme-toggle-text">Mode</span>
                </button>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('konten')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} <strong>SIAKAD</strong> &mdash; Praktikum Desain Web</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleText = document.getElementById('theme-toggle-text');

            function updateThemeText(theme) {
                if (themeToggleText) {
                    themeToggleText.textContent = theme === 'dark' ? 'Gelap' : 'Terang';
                }
            }

            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            updateThemeText(currentTheme);

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    const current = document.documentElement.getAttribute('data-theme') || 'light';
                    const next = current === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', next);
                    try {
                        localStorage.setItem('siakad-theme', next);
                    } catch (e) {}
                    updateThemeText(next);
                });
            }
        });
    </script>
</body>
</html>
