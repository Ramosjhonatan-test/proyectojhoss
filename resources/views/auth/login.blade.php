<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Financiero | Iniciar sesión</title>
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

            .auth-visual {
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                background: #173d36;
                padding: clamp(32px, 6vw, 88px);
                color: white;
            }

            .auth-visual::before {
                content: "";
                position: absolute;
                inset: 0;
                background: url('https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=1600&q=85') center/cover no-repeat;
                opacity: 0.32;
            }

            .auth-visual::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(13, 42, 35, 0.18), rgba(13, 42, 35, 0.9));
            }

            .auth-visual > * {
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

            .panel-copy {
                max-width: 460px;
                margin-top: auto;
                margin-bottom: 34px;
            }

            .panel-copy h1 {
                margin: 0 0 16px;
                max-width: 680px;
                font-size: clamp(2.5rem, 4.4vw, 4.6rem);
                letter-spacing: 0;
                line-height: 1.05;
            }

            .panel-copy p {
                margin: 0;
                line-height: 1.75;
                color: rgba(255,255,255,0.8);
            }

            .metric-box {
                display: flex;
                max-width: 520px;
                border-top: 1px solid rgba(255,255,255,0.28);
                padding-top: 18px;
            }

            .metric {
                padding: 0;
            }

            .metric strong {
                display: block;
                font-size: 1rem;
                margin-bottom: 5px;
            }

            .metric span {
                color: rgba(255,255,255,0.75);
                font-size: 0.85rem;
            }

            .auth-form-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: clamp(30px, 7vw, 100px);
                background: var(--paper);
            }

            .auth-card {
                width: min(100%, 470px);
            }

            .auth-top {
                display: block;
                margin-bottom: 30px;
            }

            .auth-top h2 {
                margin: 0;
                font-size: clamp(2rem, 3vw, 2.8rem);
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
                margin: 0 0 28px;
                color: var(--muted);
                line-height: 1.7;
            }

            .form-error {
                margin-bottom: 16px;
                border: 1px solid #fecaca;
                border-radius: 8px;
                background: #fef2f2;
                color: #b91c1c;
                padding: 11px 13px;
                font-size: 0.9rem;
            }

            .field-error { color: #b91c1c; font-size: 0.82rem; }

            form {
                display: grid;
                gap: 18px;
            }

            .field {
                display: grid;
                gap: 8px;
            }

            label {
                font-weight: 700;
                font-size: 0.9rem;
                color: var(--text);
            }

            input {
                width: 100%;
                border: 1px solid rgba(15, 23, 42, 0.12);
                background: #f8fafc;
                border-radius: 8px;
                padding: 0.95rem 1rem;
                font: inherit;
                color: var(--text);
                outline: none;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            input:focus {
                border-color: rgba(29, 78, 216, 0.6);
                box-shadow: 0 0 0 4px rgba(29,78,216,0.08);
            }

            .link {
                color: var(--primary-soft);
                font-weight: 700;
            }

            .primary-btn {
                appearance: none;
                border: none;
                border-radius: 8px;
                padding: 1rem 1.2rem;
                font: inherit;
                font-weight: 800;
                color: white;
                background: var(--primary-soft);
                box-shadow: 0 10px 24px rgba(20,125,100,0.18);
                cursor: pointer;
            }

            .primary-btn:hover { background: #116653; }

            .auth-footer {
                margin-top: 20px;
                text-align: center;
                color: var(--muted);
                font-size: 0.95rem;
            }

            @media (max-width: 860px) {
                .auth-shell { grid-template-columns: 1fr; }
                .auth-visual { min-height: 420px; padding: 30px 28px; }

                .panel-copy {
                    margin-top: auto;
                    padding-top: 64px;
                }

                .auth-form-wrap {
                    min-height: auto;
                    padding: 56px 28px;
                }
            }

            @media (max-width: 520px) {
                .auth-visual { min-height: 360px; }
                .metric strong { font-size: 0.95rem; }
            }
        </style>
    </head>
    <body>
        <div class="auth-shell">
            <aside class="auth-visual">
                <div class="brand">
                    <img class="brand-logo" src="{{ asset('logo/logo.png') }}" alt="">
                    <span>Sistema Financiero</span>
                </div>

                <div class="panel-copy">
                    <h1>Una visión clara de cada operación.</h1>
                    <p>Administra clientes, préstamos, cuotas y cobranzas con acceso definido por el rol de tu cuenta.</p>
                </div>

                <div class="metric-box">
                    <div class="metric">
                        <strong>Gestión de crédito</strong>
                        <span>Clientes, préstamos y cobranzas</span>
                    </div>
                </div>
            </aside>

            <main class="auth-form-wrap">
                <div class="auth-card">
                    <div class="auth-top">
                        <span class="pill">Portal financiero</span>
                        <h2>Bienvenido de nuevo</h2>
                    </div>
                    <p>Ingresa con las credenciales de tu usuario.</p>

                    @if ($errors->any())
                        <div class="form-error" role="alert">{{ $errors->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="field">
                            <label for="correo">Correo electrónico</label>
                            <input id="correo" type="email" name="correo" value="{{ old('correo') }}" placeholder="nombre@empresa.com" autocomplete="username" required>
                            @error('correo') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" name="password" placeholder="Tu contraseña" autocomplete="current-password" required>
                            @error('password') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <button class="primary-btn" type="submit">Entrar a mi cuenta</button>
                    </form>

                    <div class="auth-footer">
                        ¿No tienes cuenta? <a href="{{ route('register') }}" class="link">Crear cuenta</a>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
