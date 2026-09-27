<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Northstar Finance | Iniciar sesión</title>
        <style>
            :root {
                --bg: #f5f7ff;
                --panel: #ffffff;
                --panel-soft: #eef4ff;
                --primary: #0f172a;
                --primary-soft: #1d4ed8;
                --accent: #14b8a6;
                --text: #0f172a;
                --muted: #475569;
                --line: rgba(15, 23, 42, 0.08);
                --shadow: 0 28px 60px rgba(15, 23, 42, 0.12);
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                min-height: 100vh;
                font-family: Inter, 'Segoe UI', sans-serif;
                background: linear-gradient(135deg, #edf5ff 0%, #f6fbff 40%, #eefaf5 100%);
                color: var(--text);
            }

            a { text-decoration: none; }

            .auth-shell {
                min-height: 100vh;
                display: grid;
                grid-template-columns: 1.1fr 0.9fr;
            }

            .auth-visual {
                position: relative;
                overflow: hidden;
                background: linear-gradient(160deg, #0f172a 0%, #14213d 50%, #1d4ed8 100%);
                padding: 60px 56px;
                color: white;
            }

            .auth-visual::before {
                content: "";
                position: absolute;
                inset: 0;
                background: url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
                opacity: 0.18;
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

            .brand-mark {
                width: 42px;
                height: 42px;
                border-radius: 14px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, #1d4ed8, #14b8a6);
                box-shadow: 0 14px 30px rgba(29,78,216,0.35);
            }

            .panel-copy {
                max-width: 460px;
                margin-top: 90px;
            }

            .panel-copy h1 {
                margin: 0 0 16px;
                font-size: clamp(2.5rem, 4vw, 4rem);
                letter-spacing: -0.05em;
                line-height: 1.05;
            }

            .panel-copy p {
                margin: 0;
                line-height: 1.75;
                color: rgba(255,255,255,0.8);
            }

            .metric-box {
                margin-top: 42px;
                display: grid;
                grid-template-columns: repeat(2, minmax(0,1fr));
                gap: 18px;
                max-width: 420px;
            }

            .metric {
                background: rgba(255,255,255,0.08);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 18px;
                padding: 18px 16px;
            }

            .metric strong {
                display: block;
                font-size: 1.7rem;
                margin-bottom: 2px;
            }

            .metric span {
                color: rgba(255,255,255,0.75);
                font-size: 0.85rem;
            }

            .auth-form-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 42px 28px;
                background: rgba(255,255,255,0.74);
            }

            .auth-card {
                width: min(100%, 440px);
                background: rgba(255,255,255,0.96);
                border: 1px solid var(--line);
                border-radius: 26px;
                box-shadow: var(--shadow);
                padding: 32px 26px;
            }

            .auth-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                margin-bottom: 22px;
            }

            .auth-top h2 {
                margin: 0;
                font-size: 2rem;
                letter-spacing: -0.05em;
            }

            .pill {
                background: rgba(20,184,166,0.10);
                color: #0f766e;
                border: 1px solid rgba(20,184,166,0.18);
                border-radius: 999px;
                padding: 0.42rem 0.75rem;
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.06em;
                text-transform: uppercase;
            }

            .auth-card p {
                margin: 0 0 24px;
                color: var(--muted);
                line-height: 1.7;
            }

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
                border-radius: 14px;
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

            .row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                font-size: 0.92rem;
                color: var(--muted);
            }

            .check {
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .check input {
                width: auto;
                accent-color: var(--primary-soft);
            }

            .link {
                color: var(--primary-soft);
                font-weight: 700;
            }

            .primary-btn {
                appearance: none;
                border: none;
                border-radius: 14px;
                padding: 1rem 1.2rem;
                font: inherit;
                font-weight: 800;
                color: white;
                background: linear-gradient(135deg, #1d4ed8, #14b8a6);
                box-shadow: 0 16px 30px rgba(29,78,216,0.25);
                cursor: pointer;
            }

            .auth-footer {
                margin-top: 20px;
                text-align: center;
                color: var(--muted);
                font-size: 0.95rem;
            }

            @media (max-width: 860px) {
                .auth-shell {
                    grid-template-columns: 1fr;
                }

                .auth-visual {
                    padding: 42px 28px 26px;
                }

                .panel-copy {
                    margin-top: 30px;
                }

                .auth-form-wrap {
                    padding-top: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-shell">
            <aside class="auth-visual">
                <div class="brand">
                    <span class="brand-mark">N</span>
                    <span>Northstar Finance</span>
                </div>

                <div class="panel-copy">
                    <h1>Gestiona tu flujo con confianza.</h1>
                    <p>Organiza cuentas, pagos, presupuestos y métricas financieras desde una única plataforma segura y fácil de usar.</p>
                </div>

                <div class="metric-box">
                    <div class="metric">
                        <strong>12k+</strong>
                        <span>Usuarios activos</span>
                    </div>
                    <div class="metric">
                        <strong>99.9%</strong>
                        <span>Disponibilidad</span>
                    </div>
                </div>
            </aside>

            <main class="auth-form-wrap">
                <div class="auth-card">
                    <div class="auth-top">
                        <h2>Iniciar sesión</h2>
                        <span class="pill">Secure</span>
                    </div>
                    <p>Accede a tu panel financiero para revisar movimientos, presupuestos y reportes.</p>

                    <form>
                        <div class="field">
                            <label for="email">Correo electrónico</label>
                            <input id="email" type="email" name="email" placeholder="nombre@empresa.com">
                        </div>

                        <div class="field">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" name="password" placeholder="••••••••••">
                        </div>

                        <div class="row">
                            <label class="check">
                                <input type="checkbox" name="remember">
                                <span>Recordarme</span>
                            </label>
                            <a href="#" class="link">¿Olvidaste tu contraseña?</a>
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
