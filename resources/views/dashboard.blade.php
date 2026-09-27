<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Northstar Finance | Dashboard</title>
        <style>
            :root {
                --bg: #f5f7fb;
                --panel: #ffffff;
                --panel-alt: #f8fafc;
                --primary: #0f172a;
                --primary-soft: #1d4ed8;
                --green: #22c55e;
                --accent: #14b8a6;
                --text: #0f172a;
                --muted: #475569;
                --line: rgba(15,23,42,0.08);
                --shadow: 0 20px 45px rgba(15,23,42,0.08);
            }

            * { box-sizing: border-box; }
            body {
                margin: 0;
                font-family: Inter, 'Segoe UI', sans-serif;
                background: #eef4ff;
                color: var(--text);
            }

            a { text-decoration: none; }
            .app-shell {
                display: grid;
                grid-template-columns: 260px minmax(0,1fr);
                min-height: 100vh;
            }

            .sidebar {
                background: linear-gradient(180deg, #0f172a, #111827);
                color: white;
                padding: 28px 18px;
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 12px;
                font-weight: 800;
                padding: 0 8px 28px;
            }

            .brand-mark {
                width: 38px;
                height: 38px;
                border-radius: 12px;
                display: grid;
                place-items: center;
                background: linear-gradient(135deg, #1d4ed8, #14b8a6);
            }

            .nav {
                display: grid;
                gap: 8px;
            }

            .nav a {
                color: rgba(255,255,255,0.75);
                padding: 12px 12px;
                border-radius: 12px;
                font-weight: 600;
            }

            .nav a.active {
                background: rgba(255,255,255,0.08);
                color: white;
            }

            .content {
                padding: 32px;
            }

            .topbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 18px;
                margin-bottom: 28px;
            }

            .topbar h1 {
                margin: 0;
                font-size: clamp(2rem, 3vw, 2.7rem);
                letter-spacing: -0.05em;
            }

            .top-actions {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .top-actions .chip {
                background: white;
                padding: 0.7rem 0.9rem;
                border-radius: 12px;
                border: 1px solid var(--line);
                font-weight: 700;
            }

            .summary {
                display: grid;
                grid-template-columns: repeat(4, minmax(0,1fr));
                gap: 18px;
                margin-bottom: 26px;
            }

            .card {
                background: var(--panel);
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 22px;
                box-shadow: var(--shadow);
            }

            .card small {
                display: block;
                color: var(--muted);
                margin-bottom: 12px;
            }

            .card strong {
                font-size: 2rem;
                letter-spacing: -0.05em;
            }

            .card span {
                display: inline-block;
                margin-top: 8px;
                color: #166534;
                font-weight: 700;
            }

            .main-grid {
                display: grid;
                grid-template-columns: 1.3fr 0.7fr;
                gap: 22px;
            }

            .chart-card {
                background: var(--panel);
                border-radius: 22px;
                border: 1px solid var(--line);
                padding: 22px;
                box-shadow: var(--shadow);
            }

            .chart-card h3,
            .side-card h3 {
                margin: 0 0 18px;
            }

            .bars {
                display: flex;
                align-items: end;
                gap: 12px;
                height: 200px;
                margin-top: 18px;
            }

            .bar {
                flex: 1;
                border-radius: 14px 14px 0 0;
                background: linear-gradient(180deg, #60a5fa, #1d4ed8);
            }

            .bar.alt { background: linear-gradient(180deg, #34d399, #16a34a); }
            .bar.gold { background: linear-gradient(180deg, #fbbf24, #f59e0b); }
            .bar.purple { background: linear-gradient(180deg, #a78bfa, #7c3aed); }

            .side-card {
                background: var(--panel);
                border-radius: 22px;
                border: 1px solid var(--line);
                padding: 22px;
                box-shadow: var(--shadow);
            }

            .account-list {
                display: grid;
                gap: 14px;
            }

            .account-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 0;
                border-bottom: 1px solid var(--line);
            }

            .account-row:last-child { border-bottom: 0; }

            .account-name {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: #1d4ed8;
                box-shadow: 0 0 0 4px rgba(29,78,216,0.12);
            }

            .dot.green { background: var(--green); box-shadow: 0 0 0 4px rgba(34,197,94,0.12); }
            .dot.gold { background: #f59e0b; box-shadow: 0 0 0 4px rgba(245,158,11,0.12); }

            .bottom-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 22px;
                margin-top: 22px;
            }

            .list-card {
                background: var(--panel);
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 22px;
                box-shadow: var(--shadow);
            }

            ul.tasks {
                list-style: none;
                padding: 0;
                margin: 0;
                display: grid;
                gap: 14px;
            }

            .tasks li {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 18px;
                padding: 12px 0;
                border-bottom: 1px solid var(--line);
            }

            .tasks li:last-child { border-bottom: 0; }

            .tag {
                display: inline-flex;
                padding: 5px 8px;
                border-radius: 999px;
                font-size: 0.72rem;
                font-weight: 700;
                background: rgba(34,197,94,0.12);
                color: #166534;
            }

            .tag.pending {
                background: rgba(245,158,11,0.12);
                color: #92400e;
            }

            @media (max-width: 980px) {
                .app-shell {
                    grid-template-columns: 1fr;
                }

                .sidebar {
                    padding-bottom: 16px;
                }

                .summary,
                .main-grid,
                .bottom-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .main-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 640px) {
                .content {
                    padding: 18px;
                }

                .topbar {
                    display: block;
                }

                .summary,
                .bottom-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="app-shell">
            <aside class="sidebar">
                <div class="brand">
                    <span class="brand-mark">N</span>
                    <span>Northstar</span>
                </div>

                <nav class="nav" aria-label="Sidebar menu">
                    <a class="active" href="#">Dashboard</a>
                    <a href="#">Cuentas</a>
                    <a href="#">Cobranza</a>
                    <a href="#">Pagos</a>
                    <a href="#">Presupuestos</a>
                    <a href="#">Reportes</a>
                    <a href="#">Configuración</a>
                </nav>
            </aside>

            <main class="content">
                <div class="topbar">
                    <h1>Resumen financiero</h1>
                    <div class="top-actions">
                        <span class="chip">Q3 2026</span>
                        <a href="{{ route('landing') }}" class="chip" style="background: linear-gradient(135deg, #1d4ed8, #14b8a6); color:white; border:0;">Volver al sitio</a>
                    </div>
                </div>

                <section class="summary">
                    <div class="card">
                        <small>Ingresos</small>
                        <strong>$84.2K</strong>
                        <span>+18.4% vs. mes anterior</span>
                    </div>
                    <div class="card">
                        <small>Gastos</small>
                        <strong>$42.9K</strong>
                        <span>-8.1% ahorrado</span>
                    </div>
                    <div class="card">
                        <small>Flujo neto</small>
                        <strong>$41.3K</strong>
                        <span>+12.7% saludable</span>
                    </div>
                    <div class="card">
                        <small>Disponibilidad</small>
                        <strong>78%</strong>
                        <span>Meta de caja cumplida</span>
                    </div>
                </section>

                <section class="main-grid">
                    <div class="chart-card">
                        <h3>Rentabilidad mensual</h3>
                        <div class="bars">
                            <span class="bar" style="height:36%"></span>
                            <span class="bar alt" style="height:48%"></span>
                            <span class="bar gold" style="height:62%"></span>
                            <span class="bar purple" style="height:82%"></span>
                            <span class="bar" style="height:68%"></span>
                            <span class="bar alt" style="height:90%"></span>
                        </div>
                    </div>

                    <div class="side-card">
                        <h3>Cuentas principales</h3>
                        <div class="account-list">
                            <div class="account-row">
                                <div class="account-name"><span class="dot"></span><span>Cuenta operativa</span></div>
                                <strong>$28.4K</strong>
                            </div>
                            <div class="account-row">
                                <div class="account-name"><span class="dot green"></span><span>Inversiones</span></div>
                                <strong>$54.2K</strong>
                            </div>
                            <div class="account-row">
                                <div class="account-name"><span class="dot gold"></span><span>Pagos pendientes</span></div>
                                <strong>$8.7K</strong>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bottom-grid">
                    <div class="list-card">
                        <h3>Próximas tareas</h3>
                        <ul class="tasks">
                            <li><span>Revisión de presupuesto</span><span class="tag">Listo</span></li>
                            <li><span>Conciliación bancaria</span><span class="tag pending">Pendiente</span></li>
                            <li><span>Cierre mensual</span><span class="tag pending">Pendiente</span></li>
                        </ul>
                    </div>

                    <div class="list-card">
                        <h3>Indicadores clave</h3>
                        <ul class="tasks">
                            <li><span>Margen bruto</span><strong>31.2%</strong></li>
                            <li><span>Rotación de caja</span><strong>6.4d</strong></li>
                            <li><span>Endeudamiento</span><strong>18.9%</strong></li>
                        </ul>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
