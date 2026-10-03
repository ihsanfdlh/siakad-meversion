<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f2f5ff">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Masuk | Sistem Informasi Akademik</title>
    <style>
        .login-page {
            align-items: center;
            background:
                radial-gradient(ellipse at 12% 12%, rgba(83, 111, 229, .1), transparent 28rem),
                radial-gradient(ellipse at 92% 88%, rgba(83, 111, 229, .08), transparent 25rem),
                #f5f7fc;
            display: grid;
            min-height: 100vh;
            min-height: 100svh;
            overflow: hidden;
            padding: 36px 22px;
            position: relative;
        }

        .login-layout {
            background: #fff;
            border: 1px solid rgba(224, 229, 241, .9);
            border-radius: 24px;
            box-shadow: 0 28px 80px rgba(34, 48, 91, .12);
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(390px, .95fr);
            margin: 0 auto;
            max-width: 1060px;
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .login-aside {
            background: linear-gradient(145deg, #314bbd 0%, #3958d8 54%, #5972e4 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 620px;
            overflow: hidden;
            padding: clamp(34px, 5vw, 62px);
            position: relative;
        }

        .login-aside::before,
        .login-aside::after {
            border: 1px solid rgba(255, 255, 255, .12);
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
            background: rgba(255, 255, 255, .16);
            border: 1px solid rgba(255, 255, 255, .24);
            border-radius: 12px;
            color: #fff;
            display: flex;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px;
            font-weight: 800;
            height: 44px;
            justify-content: center;
            width: 44px;
        }

        .login-brand-name {
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .1px;
        }

        .login-brand-caption {
            color: rgba(255, 255, 255, .72);
            display: block;
            font-size: 10px;
            margin-top: 2px;
        }

        .login-aside-copy {
            margin: 56px 0;
            max-width: 410px;
        }

        .login-kicker {
            align-items: center;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .17);
            border-radius: 30px;
            color: rgba(255, 255, 255, .92);
            display: inline-flex;
            font-size: 10px;
            font-weight: 700;
            gap: 8px;
            letter-spacing: 1.15px;
            margin-bottom: 22px;
            padding: 8px 12px;
            text-transform: uppercase;
        }

        .login-kicker::before {
            background: #a8f0cb;
            border-radius: 50%;
            content: "";
            height: 7px;
            width: 7px;
        }

        .login-aside h1 {
            color: #fff;
            font-size: clamp(32px, 4vw, 44px);
            letter-spacing: -1.5px;
            line-height: 1.12;
            margin-bottom: 17px;
            max-width: 390px;
        }

        .login-aside-copy p {
            color: rgba(255, 255, 255, .78);
            font-size: 14px;
            line-height: 1.8;
            max-width: 370px;
        }

        .login-aside-note {
            align-items: center;
            background: rgba(255, 255, 255, .11);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 13px;
            color: rgba(255, 255, 255, .88);
            display: flex;
            font-size: 11px;
            gap: 12px;
            line-height: 1.6;
            max-width: 355px;
            padding: 14px 16px;
        }

        .login-aside-note span:first-child {
            align-items: center;
            background: rgba(255, 255, 255, .16);
            border-radius: 9px;
            color: #fff;
            display: flex;
            flex: 0 0 34px;
            font-size: 16px;
            height: 34px;
            justify-content: center;
        }

        .login-content {
            align-items: center;
            display: flex;
            justify-content: center;
            padding: clamp(34px, 5vw, 62px);
        }

        .login-content-inner {
            max-width: 370px;
            width: 100%;
        }

        .login-content .eyebrow {
            margin-bottom: 10px;
        }

        .login-heading {
            color: #172033;
            font-size: clamp(27px, 3vw, 32px);
            letter-spacing: -1px;
            margin-bottom: 9px;
        }

        .login-subheading {
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .login-form {
            display: grid;
            gap: 19px;
        }

        .login-form .field label {
            color: #3d4960;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .login-input-wrap {
            position: relative;
        }

        .login-form .field input {
            background: #fbfcff;
            border-color: #dfe4ef;
            border-radius: 9px;
            font-size: 13px;
            min-height: 47px;
            padding: 12px 14px;
        }

        .login-form .field input:focus {
            border-color: #6b83e7;
            box-shadow: 0 0 0 3px rgba(57, 88, 216, .11);
        }

        .login-form .password-input {
            padding-right: 90px;
        }

        .password-toggle {
            background: transparent;
            border: 0;
            border-radius: 6px;
            color: #5268c4;
            cursor: pointer;
            font: inherit;
            font-size: 11px;
            font-weight: 700;
            padding: 6px 7px;
            position: absolute;
            right: 9px;
            top: 50%;
            transform: translateY(-50%);
        }

        .password-toggle:hover {
            background: #eef2ff;
            color: #2844bb;
        }

        .login-error {
            background: #fff3f3;
            border: 1px solid #f2cccc;
            border-radius: 9px;
            color: #a92f38;
            font-size: 12px;
            line-height: 1.6;
            padding: 11px 13px;
        }

        .login-submit {
            justify-content: space-between;
            margin-top: 2px;
            min-height: 48px;
            padding: 12px 16px;
            width: 100%;
        }

        .login-submit-arrow {
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
            transition: transform .2s ease;
        }

        .login-submit:hover .login-submit-arrow {
            transform: translateX(3px);
        }

        .login-helper {
            border-top: 1px solid #edf0f5;
            color: #858fa2;
            font-size: 11px;
            line-height: 1.7;
            margin-top: 22px;
            padding-top: 17px;
        }

        .login-footer {
            color: #9aa3b3;
            font-size: 10px;
            margin-top: 35px;
            text-align: center;
        }

        .login-page :focus-visible {
            outline: 3px solid rgba(57, 88, 216, .38);
            outline-offset: 3px;
        }

        @media (max-width: 780px) {
            .login-layout {
                grid-template-columns: 1fr;
                max-width: 520px;
            }

            .login-aside {
                min-height: 0;
                padding: 32px;
            }

            .login-aside-copy {
                margin: 38px 0 29px;
            }

            .login-aside h1 {
                font-size: 34px;
            }

            .login-content {
                padding: 38px 32px;
            }

            .login-footer {
                margin-top: 24px;
            }
        }

        @media (max-width: 480px) {
            .login-page {
                padding: 0;
            }

            .login-layout {
                border: 0;
                border-radius: 0;
                min-height: 100vh;
                min-height: 100svh;
            }

            .login-aside {
                padding: 26px 23px 24px;
            }

            .login-aside-copy {
                margin: 30px 0 0;
            }

            .login-aside h1 {
                font-size: 30px;
            }

            .login-aside-copy p {
                font-size: 12px;
            }

            .login-aside-note {
                display: none;
            }

            .login-content {
                align-items: flex-start;
                padding: 30px 23px;
            }

            .login-subheading {
                margin-bottom: 24px;
            }
        }
    </style>
</head>
<body>
    <main class="login-page">
        <div class="login-layout">
            <section class="login-aside" aria-label="Tentang sistem akademik">
                <div class="login-brand">
                    <span class="login-brand-mark" aria-hidden="true">S</span>
                    <div>
                        <span class="login-brand-name">Sistem Informasi Akademik</span>
                        <span class="login-brand-caption">Portal layanan akademik</span>
                    </div>
                </div>

                <div class="login-aside-copy">
                    <span class="login-kicker">Ruang akademik Anda</span>
                    <h1>Belajar dan bertumbuh, dimulai dari sini.</h1>
                    <p>Masuk ke akun Anda untuk melanjutkan aktivitas di Sistem Informasi Akademik dengan nyaman dan teratur.</p>
                </div>

                <div class="login-aside-note">
                    <span aria-hidden="true">✦</span>
                    <span>Gunakan akun akademik yang terdaftar untuk mengakses portal.</span>
                </div>
            </section>

            <section class="login-content" aria-labelledby="login-heading">
                <div class="login-content-inner">
                    <span class="eyebrow">SELAMAT DATANG KEMBALI</span>
                    <h2 class="login-heading" id="login-heading">Masuk ke akun</h2>
                    <p class="login-subheading">Masukkan email dan password untuk melanjutkan.</p>

                    <form action="{{ route('login.process') }}" method="POST" class="login-form">
                        @csrf

                        @if ($errors->any())
                            <div class="login-error" role="alert" aria-live="assertive">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="field">
                            <label for="email">Email</label>
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
                                    placeholder="Masukkan password"
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
                                >Tampilkan</button>
                            </div>
                        </div>

                        <button class="button button-primary login-submit" type="submit">
                            <span>Masuk ke portal</span>
                            <span class="login-submit-arrow" aria-hidden="true">→</span>
                        </button>
                    </form>

                    <p class="login-helper">Pastikan email dan password sudah benar sebelum masuk.</p>
                    <p class="login-footer">&copy; {{ date('Y') }} Sistem Informasi Akademik</p>
                </div>
            </section>
        </div>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('toggle-password');

        passwordToggle.addEventListener('click', () => {
            const isPasswordVisible = passwordInput.type === 'password';

            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            passwordToggle.textContent = isPasswordVisible ? 'Sembunyikan' : 'Tampilkan';
            passwordToggle.setAttribute('aria-label', isPasswordVisible ? 'Sembunyikan password' : 'Tampilkan password');
            passwordToggle.setAttribute('aria-pressed', String(isPasswordVisible));
        });
    </script>
</body>
</html>
