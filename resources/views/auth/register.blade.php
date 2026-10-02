<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Financiero | Crear cuenta</title>
        <style>
            :root {
                --primary: #173d36;
                --primary-soft: #147d64;
                --accent: #a6cf63;
                --text: #172622;
                --muted: #65756f;
                --line: #d9e2dd;
                --paper: #f4f6f2;
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                min-height: 100vh;
                font-family: Inter, 'Segoe UI', sans-serif;
                background: var(--paper);
                color: var(--text);
            }

            a { text-decoration: none; }

            .auth-shell {
                min-height: 100vh;
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            }

            .auth-form-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: clamp(30px, 5vw, 72px);
                background: var(--paper);
            }

            .auth-card {
                width: min(100%, 560px);
            }

            .auth-top {
                display: flex;
                display: block;
                margin-bottom: 24px;
            }

            .auth-top h2 {
                margin: 0;
                font-size: clamp(2rem, 3vw, 2.65rem);
                letter-spacing: 0;
                line-height: 1.1;
            }

            .pill {
                display: inline-block;
                margin-bottom: 12px;
                color: var(--primary-soft);
                font-size: 0.76rem;
                font-weight: 800;
                letter-spacing: 0;
                text-transform: uppercase;
            }

            .auth-card p {
                margin: 0 0 26px;
                color: var(--muted);
                line-height: 1.7;
            }

            form {
                display: grid;
                gap: 14px;
            }

            .two-col {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .field {
                display: grid;
                gap: 8px;
            }

            label {
                font-size: 0.9rem;
                font-weight: 700;
            }

            input {
                width: 100%;
                border: 1px solid rgba(15, 23, 42, 0.12);
                background: #f8fafc;
                border-radius: 8px;
                padding: 0.92rem 1rem;
                font: inherit;
                color: var(--text);
                outline: none;
            }

            input:focus {
                border-color: rgba(20,125,100,0.6);
                box-shadow: 0 0 0 4px rgba(20,125,100,0.08);
            }

            .primary-btn {
                appearance: none;
                border: none;
                border-radius: 14px;
                padding: 1rem 1.2rem;
                font: inherit;
                font-weight: 800;
                color: white;
                background: var(--primary-soft);
                box-shadow: 0 10px 24px rgba(20,125,100,0.18);
                cursor: pointer;
            }

            .primary-btn:hover { background: #116653; }

            .form-error {
                border: 1px solid #fecaca;
                border-radius: 10px;
                background: #fef2f2;
                color: #b91c1c;
                padding: 11px 13px;
                font-size: 0.9rem;
            }

            .field-error { color: #b91c1c; font-size: 0.82rem; }

            .role-note {
                border-left: 3px solid var(--accent);
                background: #eaf2ed;
                padding: 12px 14px;
                color: #36534a;
                font-size: 0.88rem;
                line-height: 1.55;
            }

            .auth-footer {
                margin-top: 20px;
                text-align: center;
                color: var(--muted);
                font-size: 0.95rem;
            }

            .link {
                color: var(--primary-soft);
                font-weight: 700;
            }

            .visual {
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                background: #173d36;
                padding: clamp(32px, 6vw, 88px);
                color: white;
            }

            .visual::before {
                content: "";
                position: absolute;
                inset: 0;
                background: url('https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1600&q=85') center/cover no-repeat;
                opacity: 0.3;
            }

            .visual::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(13, 42, 35, 0.18), rgba(13, 42, 35, 0.9));
            }

            .visual > * {
                position: relative;
                z-index: 1;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                font-size: 1.1rem;
                font-weight: 800;
                color: white;
            }

            .brand-logo {
                width: 54px;
                height: 54px;
                object-fit: contain;
            }

            .info-box {
                margin-top: auto;
                margin-bottom: 34px;
                max-width: 430px;
            }

            .info-box h1 {
                margin: 0 0 18px;
                font-size: clamp(2.5rem, 4.4vw, 4.6rem);
                letter-spacing: 0;
                line-height: 1.02;
            }

            .info-box p {
                margin: 0;
                color: rgba(255,255,255,0.8);
                line-height: 1.75;
            }

            @media (max-width: 860px) {
                .auth-shell { grid-template-columns: 1fr; }

                .visual {
                    min-height: 420px;
                    padding: 30px 28px;
                }

                .info-box {
                    margin-top: auto;
                    padding-top: 64px;
                }

                .auth-form-wrap {
                    min-height: auto;
                    padding: 42px 28px 56px;
                }
            }

            @media (max-width: 560px) {
                .visual { min-height: 360px; }

                .two-col {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-shell">
            <aside class="visual">
                <div class="brand">
                    <img class="brand-logo" src="{{ asset('logo/logo.png') }}" alt="">
                    <span>Sistema Financiero</span>
                </div>

                <div class="info-box">
                    <h1>Una cuenta para seguir tu actividad financiera.</h1>
                    <p>Registra tus datos y solicita acceso al portal de clientes de ASSCOMPANY S.R.L.</p>
                </div>
            </aside>

            <main class="auth-form-wrap">
                <div class="auth-card">
                    <div class="auth-top">
                        <span class="pill">Alta de usuario</span>
                        <h2>Crear una cuenta</h2>
                    </div>
                    <p>Completa tus datos para crear tu acceso al sistema financiero.</p>

                    @if ($errors->any())
                        <div class="form-error" role="alert">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="two-col">
                            <div class="field">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" maxlength="100" autocomplete="given-name" required>
                                @error('nombre') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" maxlength="100" autocomplete="family-name" required>
                                @error('apellido') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="correo">Correo electrónico</label>
                            <input id="correo" type="email" name="correo" value="{{ old('correo') }}" maxlength="150" placeholder="nombre@empresa.com" autocomplete="email" required>
                            @error('correo') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="two-col">
                            <div class="field">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" name="password" minlength="8" autocomplete="new-password" required>
                                @error('password') <span class="field-error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" minlength="8" autocomplete="new-password" required>
                            </div>
                        </div>

                        <div class="role-note">Las cuentas nuevas reciben el rol CLIENTE. Los roles internos solo pueden ser asignados por un administrador.</div>

                        <button class="primary-btn" type="submit">Crear mi cuenta</button>
                    </form>

                    <div class="auth-footer">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="link">Iniciar sesión</a>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
