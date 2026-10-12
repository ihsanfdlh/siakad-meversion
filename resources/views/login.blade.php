<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Sistem Informasi Akademik</title>
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
        .login-page {
            align-items: center;
            background:
                radial-gradient(ellipse at 12% 12%, rgba(83, 111, 229, .12), transparent 28rem),
                radial-gradient(ellipse at 92% 88%, rgba(6, 182, 212, .1), transparent 25rem),
                var(--bg-body);
            display: grid;
            min-height: 100vh;
            min-height: 100svh;
            overflow: hidden;
            padding: 36px 22px;
            position: relative;
            transition: background 0.25s ease;
        }

        .login-topbar {
            position: absolute;
            top: 20px;
            left: 24px;
            right: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .login-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            padding: 8px 16px;
            border-radius: 20px;
            color: var(--text-secondary);
            font-size: 13px;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
        }

        .login-back-btn:hover {
            color: var(--primary);
            border-color: var(--primary-border);
            transform: translateX(-2px);
        }

        .login-layout {
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(390px, .95fr);
            margin: 40px auto 0;
            max-width: 1060px;
            overflow: hidden;
            position: relative;
            width: 100%;
            transition: background 0.25s ease, border-color 0.25s ease;
        }

        .login-aside {
            background: var(--primary-gradient);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 600px;
            overflow: hidden;
            padding: clamp(34px, 5vw, 62px);
            position: relative;
        }

        .login-aside::before,
        .login-aside::after {
            border: 1px solid rgba(255, 255, 255, .15);
            border-radius: 50%;
            content: "";
            pointer-events: none;
            position: absolute;
        }

        .login-aside::before {
            height: 380px;
            right: -175px;
            top: -140px;
            width: 380px;
        }

        .login-aside::after {
            bottom: -230px;
            height: 460px;
            right: -110px;
            width: 460px;
        }

        .login-brand,
        .login-aside-copy,
        .login-aside-note {
            position: relative;
            z-index: 1;
        }

        .login-brand {
            align-items: center;
            display: flex;
            gap: 12px;
        }

        .login-brand-mark {
            align-items: center;
            background: rgba(255, 255, 255, .2);
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 12px;
            color: #fff;
            display: flex;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            height: 44px;
            justify-content: center;
            width: 44px;
        }

        .login-brand-name {
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: .1px;
        }

        .login-brand-caption {
            color: rgba(255, 255, 255, .8);
            display: block;
            font-size: 11px;
            margin-top: 2px;
        }

        .login-aside-copy {
            margin: 50px 0;
            max-width: 410px;
        }

        .login-kicker {
            align-items: center;
            background: rgba(255, 255, 255, .15);
            border: 1px solid rgba(255, 255, 255, .22);
            border-radius: 30px;
            color: #ffffff;
            display: inline-flex;
            font-size: 11px;
            font-weight: 700;
            gap: 8px;
            letter-spacing: 1.15px;
            margin-bottom: 20px;
            padding: 7px 14px;
            text-transform: uppercase;
        }

        .login-aside h1 {
            color: #fff;
            font-size: clamp(30px, 3.2vw, 40px);
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .login-aside-copy p {
            color: rgba(255, 255, 255, .88);
            font-size: 14.5px;
            line-height: 1.7;
        }

        .login-aside-note {
            align-items: center;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 14px;
            display: flex;
            gap: 12px;
            padding: 14px 18px;
            font-size: 12.5px;
            color: rgba(255, 255, 255, .92);
        }

        .login-content {
            background: var(--bg-surface);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: clamp(34px, 5vw, 56px);
        }

        .login-heading {
            font-size: clamp(26px, 3vw, 32px);
            margin-bottom: 8px;
        }

        .login-subheading {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 28px;
        }

        .login-form {
            display: grid;
            gap: 20px;
        }

        .login-input-wrap {
            position: relative;
        }

        .login-form .field input {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: 11px;
            color: var(--text-primary);
            font-size: 14px;
            min-height: 48px;
            padding: 12px 15px;
            width: 100%;
            outline: none;
            transition: all 0.2s ease;
        }

        .login-form .field input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--border-focus);
        }

        .login-form .password-input {
            padding-right: 100px;
        }

        .password-toggle {
            background: var(--bg-surface-soft);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease;
        }

        .password-toggle:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .login-submit {
            justify-content: center;
            gap: 10px;
            margin-top: 6px;
            min-height: 50px;
            width: 100%;
        }

        .login-helper {
            border-top: 1px solid var(--border-color);
            color: var(--text-tertiary);
            font-size: 12px;
            margin-top: 24px;
            padding-top: 18px;
            text-align: center;
        }

        .login-footer {
            color: var(--text-tertiary);
            font-size: 12px;
            margin-top: 18px;
            text-align: center;
        }

        @media (max-width: 860px) {
            .login-layout {
                grid-template-columns: 1fr;
                margin-top: 60px;
                max-width: 500px;
            }

            .login-aside {
                min-height: auto;
                padding: 34px 28px;
            }

            .login-aside-copy {
                margin: 28px 0;
            }
        }
    </style>
</head>

<body>
    <main class="login-page">
        <!-- Topbar with Back button and Theme toggle -->
        <div class="login-topbar">
            <a href="{{ url('/') }}" class="login-back-btn" title="Kembali ke Beranda">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Kembali ke Beranda</span>
            </a>

            <button type="button" id="theme-toggle" class="theme-toggle-btn" aria-label="Ganti mode tampilan" title="Ganti mode tema">
                <span class="theme-toggle-track">
                    <span class="theme-toggle-thumb">
                        <i class="fa-solid fa-sun icon-sun" aria-hidden="true"></i>
                        <i class="fa-solid fa-moon icon-moon" aria-hidden="true"></i>
                    </span>
                </span>
                <span class="theme-toggle-text" id="theme-toggle-text">Mode</span>
            </button>
        </div>

        <div class="login-layout">
            <!-- Aside section -->
            <section class="login-aside" aria-label="Tentang sistem akademik">
                <div class="login-brand">
                    <span class="login-brand-mark" aria-hidden="true">S</span>
                    <div>
                        <span class="login-brand-name">Sistem Informasi Akademik</span>
                        <span class="login-brand-caption">Portal Layanan Akademik Resmi</span>
                    </div>
                </div>

                <div class="login-aside-copy">
                    <span class="login-kicker"><i class="fa-solid fa-shield-halved"></i> Portal Terverifikasi</span>
                    <h1>Akses cepat & teratur ke seluruh data kampus.</h1>
                    <p>Masuk ke akun Anda untuk mengelola informasi mahasiswa, pengajar, kurikulum, serta fasilitas ruang perkuliahan.</p>
                </div>

                <div class="login-aside-note">
                    <i class="fa-solid fa-circle-info" style="font-size: 16px;"></i>
                    <span>Gunakan kredensial resmi akademik yang telah terdaftar untuk masuk.</span>
                </div>
            </section>

            <!-- Form section -->
            <section class="login-content" aria-labelledby="login-heading">
                <div class="login-content-inner">
                    <span class="eyebrow"><i class="fa-solid fa-lock"></i> AUTENTIKASI PENGGUNA</span>
                    <h2 class="login-heading" id="login-heading">Masuk ke SIAKAD</h2>
                    <p class="login-subheading">Masukkan email dan kata sandi akun Anda untuk melanjutkan.</p>

                    <form action="{{ route('login.process') }}" method="POST" class="login-form">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-error" role="alert" style="margin-bottom: 0;">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        <div class="field">
                            <label for="email">Alamat Email</label>
                            <div class="login-input-wrap">
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nama@kampus.ac.id"
                                    autocomplete="username"
                                    inputmode="email"
                                    required
                                >
                            </div>
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <div class="login-input-wrap">
                                <input
                                    class="password-input"
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan kata sandi"
                                    autocomplete="current-password"
                                    required
                                >
                                <button
                                    class="password-toggle"
                                    id="toggle-password"
                                    type="button"
                                    aria-controls="password"
                                    aria-label="Tampilkan password"
                                    aria-pressed="false"
                                >
                                    <i class="fa-regular fa-eye" id="toggle-eye-icon"></i>
                                    <span id="toggle-label">Lihat</span>
                                </button>
                            </div>
                        </div>

                        <button class="button button-primary login-submit" type="submit">
                            <span>Masuk ke Portal</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>

                    <p class="login-helper">Pastikan alamat email dan password Anda sesuai sebelum mengirimkan formulir.</p>
                    <p class="login-footer">&copy; {{ date('Y') }} <strong>SIAKAD</strong> &mdash; Sistem Informasi Akademik</p>
                </div>
            </section>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Password Visibility Toggle
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('toggle-password');
            const toggleEyeIcon = document.getElementById('toggle-eye-icon');
            const toggleLabel = document.getElementById('toggle-label');

            if (passwordToggle && passwordInput) {
                passwordToggle.addEventListener('click', () => {
                    const isVisible = passwordInput.type === 'text';
                    passwordInput.type = isVisible ? 'password' : 'text';
                    toggleLabel.textContent = isVisible ? 'Lihat' : 'Tutup';
                    toggleEyeIcon.className = isVisible ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
                    passwordToggle.setAttribute('aria-pressed', String(!isVisible));
                });
            }

            // Theme Toggle
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
