<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SIAKAD') &mdash; Sistem Informasi Akademik</title>
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
    <style>
        /* ===== DROPDOWN NAVIGATION ===== */
        .nav-item {
            position: relative;
        }

        .nav-item > .nav-link {
            align-items: center;
            border-radius: 10px;
            color: var(--text-muted);
            display: inline-flex;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            gap: 7px;
            padding: 8px 14px;
            text-decoration: none;
            position: relative;
            transition: all 0.2s ease;
            cursor: pointer;
            background: none;
            border: none;
            user-select: none;
            white-space: nowrap;
        }

        .nav-item > .nav-link:hover,
        .nav-item > .nav-link.active {
            background: var(--bg-surface-soft);
            color: var(--text-primary);
        }

        .nav-item > .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        .nav-item > .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 14px;
            height: 3px;
            border-radius: 3px;
            background: var(--primary);
        }

        /* Chevron icon for dropdowns */
        .nav-chevron {
            font-size: 10px;
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
            opacity: 0.6;
        }

        .nav-item.is-open .nav-chevron {
            transform: rotate(180deg);
            opacity: 1;
        }

        /* Dropdown Panel */
        .nav-dropdown {
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 20px 48px -8px rgba(15, 23, 42, 0.14), 0 8px 20px -4px rgba(15, 23, 42, 0.06);
            display: block;
            min-width: 220px;
            opacity: 0;
            overflow: hidden;
            padding: 8px;
            pointer-events: none;
            position: absolute;
            top: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%) translateY(-8px) scale(0.96);
            transform-origin: top center;
            transition: opacity 0.18s ease, transform 0.22s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 200;
        }

        [data-theme="dark"] .nav-dropdown {
            box-shadow: 0 20px 48px -8px rgba(0, 0, 0, 0.5), 0 8px 20px -4px rgba(0, 0, 0, 0.3);
        }

        /* Dropdown Arrow pointing up */
        .nav-dropdown::before {
            content: '';
            position: absolute;
            top: -7px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid var(--border-color);
        }

        .nav-dropdown::after {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid var(--bg-surface);
        }

        /* Show dropdown when its menu is toggled open */
        .nav-item.is-open .nav-dropdown {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0) scale(1);
        }

        /* Dropdown section header label */
        .dropdown-section-label {
            color: var(--text-tertiary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.1em;
            padding: 6px 12px 4px;
            text-transform: uppercase;
        }

        /* Individual dropdown link */
        .dropdown-link {
            align-items: center;
            border-radius: 10px;
            color: var(--text-secondary);
            display: flex;
            font-size: 13.5px;
            font-weight: 600;
            gap: 12px;
            padding: 10px 12px;
            text-decoration: none;
            transition: all 0.15s ease;
            position: relative;
        }

        .dropdown-link:hover {
            background: var(--bg-surface-soft);
            color: var(--primary);
        }

        .dropdown-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        .dropdown-link-icon {
            align-items: center;
            background: var(--bg-surface-soft);
            border-radius: 8px;
            color: var(--text-muted);
            display: flex;
            font-size: 13px;
            height: 28px;
            justify-content: center;
            width: 28px;
            transition: all 0.15s ease;
            flex-shrink: 0;
        }

        .dropdown-link:hover .dropdown-link-icon,
        .dropdown-link.active .dropdown-link-icon {
            background: var(--primary-light);
            color: var(--primary);
        }

        .dropdown-link-text {
            flex: 1;
        }

        .dropdown-link-text small {
            color: var(--text-tertiary);
            display: block;
            font-size: 11px;
            font-weight: 500;
            margin-top: 1px;
        }

        .dropdown-divider {
            background: var(--border-color);
            height: 1px;
            margin: 6px 10px;
        }

        /* Wide dropdown for Akademik (2-column grid) */
        .nav-dropdown.dropdown-wide {
            min-width: 480px;
            left: 0;
            transform: translateX(-10%) translateY(-8px) scale(0.96);
        }

        .nav-item.is-open .nav-dropdown.dropdown-wide {
            transform: translateX(-10%) translateY(0) scale(1);
        }

        .nav-dropdown.dropdown-wide::before,
        .nav-dropdown.dropdown-wide::after {
            left: 22%;
        }

        .dropdown-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px;
        }

        /* Mobile dropdown */
        @media (max-width: 860px) {
            .nav-dropdown, .nav-dropdown.dropdown-wide {
                position: static;
                min-width: 100%;
                opacity: 1;
                pointer-events: auto;
                transform: none !important;
                box-shadow: none;
                border: none;
                border-radius: 10px;
                background: var(--bg-surface-soft);
                padding: 4px;
                margin-top: 4px;
                display: none;
            }

            .nav-dropdown::before,
            .nav-dropdown::after {
                display: none;
            }

            .nav-item.is-open .nav-dropdown {
                display: block;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-container">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo" title="Beranda SIAKAD">
                <div class="logo-icon">S</div>
                <div class="logo-text">
                    <h1>SIAKAD</h1>
                    <span>Sistem Informasi Akademik</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="navigation" id="main-navigation" aria-label="Menu Utama">

                {{-- Home --}}
                <div class="nav-item">
                    <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Beranda</span>
                    </a>
                </div>

                {{-- Akademik Dropdown --}}
                @php
                    $isAkademikActive = request()->routeIs('mahasiswa.*') || request()->routeIs('dosen.*');
                @endphp
                <div class="nav-item" id="nav-akademik">
                    <button type="button" class="nav-link {{ $isAkademikActive ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Akademik</span>
                        <i class="fa-solid fa-chevron-down nav-chevron"></i>
                    </button>
                    <div class="nav-dropdown dropdown-wide" role="menu">
                        <p class="dropdown-section-label">Data Civitas Akademika</p>
                        <div class="dropdown-grid">
                            <a class="dropdown-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}"
                               href="{{ route('mahasiswa.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-user-graduate"></i></span>
                                <span class="dropdown-link-text">
                                    Mahasiswa
                                    <small>Data & biodata mahasiswa</small>
                                </span>
                            </a>
                            <a class="dropdown-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}"
                               href="{{ route('dosen.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                                <span class="dropdown-link-text">
                                    Dosen
                                    <small>Data tenaga pengajar</small>
                                </span>
                            </a>
                            <a class="dropdown-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}"
                               href="{{ route('kelas.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-chalkboard"></i></span>
                                <span class="dropdown-link-text">
                                    Kelas
                                    <small>Data kelas pelajaran</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Kurikulum Dropdown --}}
                @php
                    $isKurikulumActive = request()->routeIs('jurusan.*') || request()->routeIs('prodi.*') || request()->routeIs('matakuliah.*');
                @endphp
                <div class="nav-item" id="nav-kurikulum">
                    <button type="button" class="nav-link {{ $isKurikulumActive ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-building-columns"></i>
                        <span>Kurikulum</span>
                        <i class="fa-solid fa-chevron-down nav-chevron"></i>
                    </button>
                    <div class="nav-dropdown dropdown-wide" role="menu">
                        <p class="dropdown-section-label">Struktur & Mata Kuliah</p>
                        <div class="dropdown-grid">
                            <a class="dropdown-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}"
                               href="{{ route('jurusan.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-building-columns"></i></span>
                                <span class="dropdown-link-text">
                                    Jurusan
                                    <small>Struktur & pimpinan jurusan</small>
                                </span>
                            </a>
                            <a class="dropdown-link {{ request()->routeIs('prodi.*') ? 'active' : '' }}"
                               href="{{ route('prodi.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-layer-group"></i></span>
                                <span class="dropdown-link-text">
                                    Program Studi
                                    <small>Jenjang & kaprodi prodi</small>
                                </span>
                            </a>
                            <a class="dropdown-link {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}"
                               href="{{ route('matakuliah.index') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-book-open"></i></span>
                                <span class="dropdown-link-text">
                                    Mata Kuliah
                                    <small>SKS, semester & kurikulum</small>
                                </span>
                            </a>
                            <a class="dropdown-link {{ request()->routeIs('jurusan.statistik') ? 'active' : '' }}"
                               href="{{ route('jurusan.statistik') }}" role="menuitem">
                                <span class="dropdown-link-icon"><i class="fa-solid fa-chart-pie"></i></span>
                                <span class="dropdown-link-text">
                                    Statistik Jurusan
                                    <small>Rekap jumlah prodi</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Fasilitas Dropdown --}}
                @php
                    $isFasilitasActive = request()->routeIs('ruang.*');
                @endphp
                <div class="nav-item" id="nav-fasilitas">
                    <button type="button" class="nav-link {{ $isFasilitasActive ? 'active' : '' }}" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-door-open"></i>
                        <span>Fasilitas</span>
                        <i class="fa-solid fa-chevron-down nav-chevron"></i>
                    </button>
                    <div class="nav-dropdown" role="menu">
                        <p class="dropdown-section-label">Ruang & Gedung</p>
                        <a class="dropdown-link {{ request()->routeIs('ruang.*') ? 'active' : '' }}"
                           href="{{ route('ruang.index') }}" role="menuitem">
                            <span class="dropdown-link-icon"><i class="fa-solid fa-door-open"></i></span>
                            <span class="dropdown-link-text">
                                Ruang Belajar
                                <small>Nomor, lokasi & kapasitas</small>
                            </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-link {{ request()->routeIs('statistik-prodi') ? 'active' : '' }}"
                           href="{{ route('statistik-prodi') }}" role="menuitem">
                            <span class="dropdown-link-icon"><i class="fa-solid fa-chart-bar"></i></span>
                            <span class="dropdown-link-text">
                                Statistik Prodi
                                <small>Rekap mahasiswa per prodi</small>
                            </span>
                        </a>
                    </div>
                </div>

            </nav>

            <!-- Actions (Theme Toggle, User Profile, Mobile Menu) -->
            <div class="header-actions">
                <!-- Theme Toggle Button -->
                <button type="button" id="theme-toggle" class="theme-toggle-btn" aria-label="Ganti mode tampilan (Dark/Light)" title="Ganti mode tema">
                    <span class="theme-toggle-track">
                        <span class="theme-toggle-thumb">
                            <i class="fa-solid fa-sun icon-sun" aria-hidden="true"></i>
                            <i class="fa-solid fa-moon icon-moon" aria-hidden="true"></i>
                        </span>
                    </span>
                    <span class="theme-toggle-text" id="theme-toggle-text">Mode</span>
                </button>

                <!-- User Account -->
                <a class="nav-user-link {{ request()->routeIs('login') || request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ auth()->check() ? route('dashboard') : route('login') }}" title="Login / Dashboard">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>{{ auth()->check() ? 'Dashboard' : 'Masuk' }}</span>
                </a>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" class="mobile-toggle-btn" aria-label="Buka menu navigasi" aria-expanded="false">
                    <i class="fa-solid fa-bars" id="mobile-menu-icon"></i>
                </button>
            </div>

        </div>
    </header>

    <!-- Isi Halaman -->
    <main class="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} <strong>SIAKAD</strong> &mdash; Sistem Informasi Akademik &bull; Dibuat untuk Kemudahan Pengelolaan Data</p>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            /* ── Theme Toggle ────────────────────────────────── */
            const themeToggleBtn  = document.getElementById('theme-toggle');
            const themeToggleText = document.getElementById('theme-toggle-text');

            function updateThemeText(theme) {
                if (themeToggleText) themeToggleText.textContent = theme === 'dark' ? 'Gelap' : 'Terang';
            }

            updateThemeText(document.documentElement.getAttribute('data-theme') || 'light');

            themeToggleBtn?.addEventListener('click', () => {
                const next = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', next);
                try { localStorage.setItem('siakad-theme', next); } catch (e) {}
                updateThemeText(next);
            });

            /* ── Mobile Menu Toggle ──────────────────────────── */
            const mobileMenuBtn  = document.getElementById('mobile-menu-btn');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');
            const mainNav        = document.getElementById('main-navigation');

            mobileMenuBtn?.addEventListener('click', () => {
                const isOpen = mainNav.classList.toggle('is-open');
                mobileMenuBtn.setAttribute('aria-expanded', String(isOpen));
                if (mobileMenuIcon) mobileMenuIcon.className = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
            });

            /* ── Dropdown Submenus ───────────────────────────── */
            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(item => {
                const trigger  = item.querySelector('button.nav-link');
                const dropdown = item.querySelector('.nav-dropdown');

                if (!trigger || !dropdown) return;

                trigger.addEventListener('click', () => {
                    const isOpen = item.classList.toggle('is-open');
                    trigger.setAttribute('aria-expanded', String(isOpen));

                    navItems.forEach(sibling => {
                        if (sibling !== item) {
                            sibling.classList.remove('is-open');
                            sibling.querySelector('button.nav-link')?.setAttribute('aria-expanded', 'false');
                        }
                    });
                });
            });

            // Keep menus open only after a trigger click; any other click closes them.
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.nav-item > button.nav-link')) {
                    navItems.forEach(item => {
                        item.classList.remove('is-open');
                        item.querySelector('button.nav-link')?.setAttribute('aria-expanded', 'false');
                    });
                }
                // Also close mobile nav
                if (mobileMenuBtn && mainNav && !mobileMenuBtn.contains(e.target) && !mainNav.contains(e.target)) {
                    mainNav.classList.remove('is-open');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    if (mobileMenuIcon) mobileMenuIcon.className = 'fa-solid fa-bars';
                }
            });

            // Close dropdowns on Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    navItems.forEach(item => {
                        item.classList.remove('is-open');
                        item.querySelector('button.nav-link')?.setAttribute('aria-expanded', 'false');
                    });
                }
            });
        });
    </script>

</body>
</html>