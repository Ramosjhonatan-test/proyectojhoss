<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Northstar Finance | Crear cuenta</title>
        <style>
            :root {
                --bg: #f5f7ff;
                --panel: #ffffff;
                --primary: #0f172a;
                --primary-soft: #1d4ed8;
                --accent: #14b8a6;
                --text: #0f172a;
                --muted: #475569;
                --line: rgba(15,23,42,0.08);
                --shadow: 0 28px 60px rgba(15, 23, 42, 0.12);
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                min-height: 100vh;
                font-family: Inter, 'Segoe UI', sans-serif;
                background: linear-gradient(135deg, #edf4ff 0%, #f4fbff 45%, #effaf5 100%);
                color: var(--text);
            }

            a { text-decoration: none; }

            .auth-shell {
                min-height: 100vh;
                display: grid;
                grid-template-columns: 0.95fr 1.05fr;
            }

            .auth-form-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 42px 28px;
                background: rgba(255,255,255,0.72);
            }

            .auth-card {
                width: min(100%, 520px);
                background: rgba(255,255,255,0.97);
                border: 1px solid var(--line);
                border-radius: 28px;
                box-shadow: var(--shadow);
                padding: 32px 26px;
            }

            .auth-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                margin-bottom: 20px;
            }

            .auth-top h2 {
                margin: 0;
                font-size: 2rem;
                letter-spacing: -0.05em;
            }

            .pill {
                background: rgba(29,78,216,0.08);
                color: var(--primary-soft);
                border: 1px solid rgba(29,78,216,0.14);
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
                gap: 16px;
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
                border-radius: 14px;
                padding: 0.92rem 1rem;
                font: inherit;
                color: var(--text);
                outline: none;
            }

            input:focus {
                border-color: rgba(29,78,216,0.6);
                box-shadow: 0 0 0 4px rgba(29,78,216,0.08);
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
                box-shadow: 0 16px 32px rgba(29,78,216,0.25);
                cursor: pointer;
            }

            .terms {
                display: inline-flex;
                align-items: start;
                gap: 8px;
                font-size: 0.9rem;
                color: var(--muted);
                line-height: 1.5;
            }

            .terms input {
                width: auto;
                margin-top: 2px;
                accent-color: var(--primary-soft);
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
                background: linear-gradient(160deg, #0f172a 0%, #1e293b 45%, #1d4ed8 100%);
                padding: 56px 42px;
                color: white;
            }

            .visual::before {
                content: "";
                position: absolute;
                inset: 0;
                background: url('https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
                opacity: 0.15;
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

            .brand-mark {
                width: 42px;
                height: 42px;
                border-radius: 14px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, #1d4ed8, #14b8a6);
                box-shadow: 0 14px 28px rgba(29,78,216,0.3);
            }

            .info-box {
                margin-top: 80px;
                max-width: 430px;
            }

            .info-box h1 {
                margin: 0 0 18px;
                font-size: clamp(2.5rem, 4vw, 4.1rem);
                letter-spacing: -0.06em;
                line-height: 1.02;
            }

            .info-box p {
                margin: 0;
                color: rgba(255,255,255,0.8);
                line-height: 1.75;
            }

            .stat-list {
                display: grid;
                grid-template-columns: repeat(2, minmax(0,1fr));
                gap: 18px;
                max-width: 420px;
                margin-top: 40px;
            }

            .stat {
                background: rgba(255,255,255,0.08);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 18px;
                padding: 18px 16px;
            }

            .stat strong {
                display: block;
                font-size: 1.7rem;
                margin-bottom: 2px;
            }

            .stat span {
                font-size: 0.85rem;
                color: rgba(255,255,255,0.74);
            }

            @media (max-width: 860px) {
                .auth-shell {
                    grid-template-columns: 1fr;
                }

                .visual {
                    padding: 42px 28px 26px;
                }

                .info-box {
                    margin-top: 32px;
                }

                .auth-form-wrap {
                    padding-top: 22px;
                }
            }

            @media (max-width: 560px) {
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
                    <span class="brand-mark">N</span>
                    <span>Northstar Finance</span>
                </div>

                <div class="info-box">
                    <h1>Comienza a crecer con claridad.</h1>
                    <p>Gestiona tus ingresos, gastos, inversiones y reportes con una plataforma familiar, rápida y segura para tu empresa.</p>
                </div>

                <div class="stat-list">
                    <div class="stat">
                        <strong>$4.8M</strong>
                        <span>Movimientos gestionados</span>
                    </div>
                    <div class="stat">
                        <strong>2.3x</strong>
                        <span>Más velocidad operativa</span>
                    </div>
                </div>
            </aside>

            <main class="auth-form-wrap">
                <div class="auth-card">
                    <div class="auth-top">
                        <h2>Crear cuenta</h2>
                        <span class="pill">Demo</span>
                    </div>
                    <p>Regístrate para activar el acceso a tu espacio financiero y comenzar con una evaluación guiada.</p>

                    <form>
                        <div class="two-col">
                            <div class="field">
                                <label for="first_name">Nombre</label>
                                <input id="first_name" type="text" name="first_name" placeholder="Tu nombre">
                            </div>
                            <div class="field">
                                <label for="last_name">Apellido</label>
                                <input id="last_name" type="text" name="last_name" placeholder="Tu apellido">
                            </div>
                        </div>

                        <div class="field">
                            <label for="company">Empresa</label>
                            <input id="company" type="text" name="company" placeholder="Nombre de la empresa">
                        </div>

                        <div class="field">
                            <label for="email">Correo electrónico</label>
                            <input id="email" type="email" name="email" placeholder="nombre@empresa.com">
                        </div>

                        <div class="field">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" name="password" placeholder="Crea una contraseña">
                        </div>

                        <label class="terms">
                            <input type="checkbox" name="terms">
                            <span>Acepto los términos y condiciones y la política de privacidad.</span>
                        </label>

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
