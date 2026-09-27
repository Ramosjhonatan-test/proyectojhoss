<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Northstar Finance | Sistema Financiero</title>
        <meta name="description" content="Sistema financiero inteligente para pagos, control de flujo, inversiones y gestión financiera empresarial.">
        <style>
            :root {
                --bg: #f5f7fb;
                --bg-soft: #eef4ff;
                --panel: #ffffff;
                --panel-alt: #0f172a;
                --primary: #0f172a;
                --primary-soft: #1d4ed8;
                --secondary: #22c55e;
                --secondary-soft: #86efac;
                --accent: #f59e0b;
                --text: #0f172a;
                --muted: #475569;
                --line: rgba(15, 23, 42, 0.08);
                --shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
                --radius: 22px;
            }

            * { box-sizing: border-box; }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                font-family: Inter, 'Segoe UI', sans-serif;
                background: linear-gradient(180deg, #f4f7ff 0%, #eefaf5 35%, #ffffff 100%);
                color: var(--text);
            }

            a { text-decoration: none; }
            img { max-width: 100%; display: block; }

            .container {
                width: min(1180px, calc(100% - 32px));
                margin: 0 auto;
            }

            .topbar {
                position: sticky;
                top: 0;
                z-index: 30;
                background: rgba(255, 255, 255, 0.82);
                backdrop-filter: blur(12px);
                border-bottom: 1px solid var(--line);
            }

            .nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 24px;
                min-height: 80px;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                font-weight: 800;
                font-size: 1.1rem;
                color: var(--text);
            }

            .brand-mark {
                width: 42px;
                height: 42px;
                border-radius: 14px;
                background: linear-gradient(135deg, var(--primary-soft), #14b8a6 90%);
                color: white;
                display: grid;
                place-items: center;
                font-size: 1.2rem;
                box-shadow: var(--shadow);
            }

            .nav-links {
                display: flex;
                align-items: center;
                gap: 28px;
                font-size: 0.95rem;
                color: var(--muted);
            }

            .nav-links a {
                color: var(--muted);
                transition: color 0.2s ease;
            }

            .nav-links a:hover { color: var(--text); }

            .nav-actions {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                padding: 0.9rem 1.3rem;
                font-weight: 700;
                border: 1px solid transparent;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                cursor: pointer;
            }

            .btn:hover {
                transform: translateY(-1px);
            }

            .btn-outline {
                background: rgba(15, 23, 42, 0.02);
                border-color: var(--line);
                color: var(--text);
            }

            .btn-primary {
                background: linear-gradient(135deg, var(--primary-soft), #1e9ad9 58%, #14b8a6);
                color: #fff;
                box-shadow: 0 16px 32px rgba(29, 78, 216, 0.28);
            }

            .hero {
                padding: 68px 0 44px;
            }

            .hero-grid {
                display: grid;
                grid-template-columns: 1.1fr 0.9fr;
                align-items: center;
                gap: 48px;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: rgba(34, 197, 94, 0.12);
                color: #166534;
                border: 1px solid rgba(34, 197, 94, 0.18);
                padding: 0.55rem 0.85rem;
                border-radius: 999px;
                font-size: 0.8rem;
                font-weight: 700;
                letter-spacing: 0.02em;
            }

            .hero-copy h1 {
                font-size: clamp(2.6rem, 5vw, 4.65rem);
                line-height: 1.05;
                margin: 18px 0 18px;
                letter-spacing: -0.06em;
            }

            .hero-copy p {
                font-size: 1.08rem;
                max-width: 620px;
                color: var(--muted);
                line-height: 1.7;
                margin: 0 0 28px;
            }

            .hero-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 16px;
                margin-bottom: 24px;
            }

            .mini-proof {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                margin-top: 20px;
                color: var(--muted);
                font-size: 0.9rem;
            }

            .mini-proof .item {
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .dot {
                width: 10px;
                height: 10px;
                background: var(--secondary);
                border-radius: 50%;
                box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.12);
            }

            .hero-visual {
                position: relative;
            }

            .dashboard-card {
                position: relative;
                background: rgba(15, 23, 42, 0.98);
                border-radius: 28px;
                padding: 22px;
                box-shadow: 0 30px 60px rgba(15, 23, 42, 0.18);
                overflow: hidden;
            }

            .dashboard-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(59,130,246,0.24), transparent 45%, rgba(20,184,166,0.15));
            }

            .hero-window {
                position: relative;
                z-index: 1;
                background: rgba(255,255,255,0.04);
                border-radius: 18px;
                border: 1px solid rgba(255,255,255,0.08);
                backdrop-filter: blur(6px);
                padding: 16px;
            }

            .window-top {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 14px;
            }

            .window-circle {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: rgba(255,255,255,0.75);
            }

            .window-circle:nth-child(1) { background: #ff5f57; }
            .window-circle:nth-child(2) { background: #ffbd2e; }
            .window-circle:nth-child(3) { background: #28c840; }

            .stats-row {
                display: grid;
                grid-template-columns: repeat(3, minmax(0,1fr));
                gap: 12px;
                margin-bottom: 18px;
            }

            .stat-box {
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 16px;
                padding: 14px 12px;
            }

            .stat-box small {
                color: rgba(255,255,255,0.7);
                display: block;
                margin-bottom: 8px;
            }

            .stat-box strong {
                color: white;
                font-size: 1.3rem;
            }

            .chart {
                background: rgba(255,255,255,0.06);
                border-radius: 18px;
                padding: 12px;
                border: 1px solid rgba(255,255,255,0.08);
            }

            .bars {
                display: flex;
                align-items: end;
                gap: 10px;
                height: 120px;
                margin-top: 14px;
            }

            .bar {
                flex: 1;
                border-radius: 10px 10px 0 0;
                background: linear-gradient(180deg, rgba(56,189,248,0.9), rgba(29,78,216,0.95));
            }

            .bar:nth-child(2) { background: linear-gradient(180deg, rgba(52,211,153,0.9), rgba(22,163,74,0.95)); }
            .bar:nth-child(3) { background: linear-gradient(180deg, rgba(250,204,21,0.9), rgba(202,138,4,0.95)); }
            .bar:nth-child(4) { background: linear-gradient(180deg, rgba(251,146,60,0.9), rgba(234,88,12,0.95)); }
            .bar:nth-child(5) { background: linear-gradient(180deg, rgba(196,181,253,0.9), rgba(109,40,217,0.95)); }

            .floating-card {
                position: absolute;
                right: -30px;
                bottom: 28px;
                background: rgba(255,255,255,0.96);
                border: 1px solid rgba(15,23,42,0.06);
                box-shadow: var(--shadow);
                border-radius: 18px;
                width: 220px;
                padding: 16px;
                z-index: 2;
            }

            .floating-card h4 {
                margin: 0 0 8px;
                font-size: 0.9rem;
                color: var(--muted);
            }

            .progress {
                height: 10px;
                background: #e2e8f0;
                border-radius: 999px;
                overflow: hidden;
            }

            .progress > span {
                display: block;
                height: 100%;
                width: 78%;
                border-radius: inherit;
                background: linear-gradient(90deg, #22c55e, #14b8a6);
            }

            .brands {
                padding: 20px 0 50px;
            }

            .brands-row {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: 24px;
                align-items: center;
                text-align: center;
                padding: 22px 18px;
                border: 1px solid var(--line);
                border-radius: 18px;
                background: rgba(255,255,255,0.5);
            }

            .brand-pill {
                color: var(--muted);
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                opacity: 0.8;
            }

            section {
                padding: 40px 0;
            }

            .section-head {
                display: flex;
                justify-content: space-between;
                align-items: end;
                gap: 24px;
                margin-bottom: 22px;
            }

            .section-head h2 {
                font-size: clamp(2rem, 4vw, 2.8rem);
                letter-spacing: -0.05em;
                margin: 0;
            }

            .section-head p {
                max-width: 460px;
                color: var(--muted);
                margin: 0;
                line-height: 1.7;
            }

            .feature-grid {
                display: grid;
                grid-template-columns: repeat(4, minmax(0,1fr));
                gap: 22px;
            }

            .feature-card {
                background: rgba(255,255,255,0.75);
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 26px 22px;
                box-shadow: 0 10px 30px rgba(15,23,42,0.04);
            }

            .icon-wrap {
                width: 54px;
                height: 54px;
                display: grid;
                place-items: center;
                border-radius: 16px;
                background: linear-gradient(135deg, rgba(29,78,216,0.1), rgba(20,184,166,0.18));
                color: var(--primary-soft);
                font-size: 1.5rem;
                margin-bottom: 16px;
            }

            .feature-card h3 {
                font-size: 1.18rem;
                margin: 0 0 10px;
            }

            .feature-card p {
                margin: 0;
                color: var(--muted);
                line-height: 1.7;
            }

            .solution-layout {
                display: grid;
                grid-template-columns: 0.95fr 1.05fr;
                gap: 28px;
                align-items: center;
            }

            .solution-photo {
                border-radius: 28px;
                overflow: hidden;
                box-shadow: var(--shadow);
                border: 1px solid var(--line);
            }

            .solution-content {
                display: grid;
                gap: 18px;
            }

            .check-list {
                display: grid;
                gap: 14px;
            }

            .check-item {
                display: grid;
                grid-template-columns: 26px 1fr;
                gap: 12px;
                align-items: start;
                padding: 16px 18px;
                border-radius: 18px;
                background: rgba(255,255,255,0.7);
                border: 1px solid var(--line);
            }

            .check-icon {
                width: 26px;
                height: 26px;
                border-radius: 50%;
                background: rgba(34,197,94,0.12);
                color: #166534;
                display: grid;
                place-items: center;
                font-size: 0.95rem;
                font-weight: 800;
            }

            .check-item strong {
                display: block;
                margin-bottom: 4px;
            }

            .check-item span {
                color: var(--muted);
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .modules-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0,1fr));
                gap: 22px;
            }

            .module-card {
                background: linear-gradient(180deg, rgba(255,255,255,0.88), rgba(241,245,249,0.8));
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 22px;
                box-shadow: 0 12px 30px rgba(15,23,42,0.04);
            }

            .module-pill {
                display: inline-flex;
                background: rgba(29,78,216,0.08);
                color: var(--primary-soft);
                border-radius: 999px;
                padding: 0.5rem 0.8rem;
                font-size: 0.72rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.08em;
            }

            .module-card h3 {
                margin: 18px 0 10px;
                font-size: 1.3rem;
            }

            .module-card p {
                margin: 0 0 14px;
                color: var(--muted);
                line-height: 1.7;
            }

            .module-card a {
                font-weight: 700;
                color: var(--primary-soft);
            }

            .pricing-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0,1fr));
                gap: 22px;
                margin-top: 18px;
            }

            .pricing-card {
                background: rgba(255,255,255,0.8);
                border: 1px solid var(--line);
                border-radius: 24px;
                padding: 28px 22px;
                position: relative;
                box-shadow: 0 16px 40px rgba(15,23,42,0.04);
            }

            .pricing-card.featured {
                background: linear-gradient(180deg, rgba(15,23,42,0.98), rgba(30,41,59,0.97));
                color: white;
                border-color: rgba(255,255,255,0.08);
                transform: translateY(-8px);
            }

            .pricing-card.featured p,
            .pricing-card.featured li,
            .pricing-card.featured .price-sub {
                color: rgba(255,255,255,0.75);
            }

            .pricing-card h3 {
                margin: 0 0 12px;
                font-size: 1.25rem;
            }

            .price {
                display: flex;
                align-items: end;
                gap: 8px;
                margin: 16px 0;
                font-weight: 800;
            }

            .price strong {
                font-size: 2.5rem;
                letter-spacing: -0.05em;
            }

            .price-sub {
                color: var(--muted);
                margin-bottom: 18px;
            }

            .pricing-card ul {
                list-style: none;
                padding: 0;
                margin: 0 0 22px;
                display: grid;
                gap: 12px;
                color: var(--muted);
            }

            .pricing-card li::before {
                content: "✓";
                color: var(--secondary);
                margin-right: 8px;
                font-weight: 800;
            }

            .testimonial-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0,1fr));
                gap: 22px;
            }

            .testimonial-card {
                background: rgba(255,255,255,0.85);
                border: 1px solid var(--line);
                border-radius: 22px;
                padding: 26px 22px;
            }

            .stars {
                color: #f59e0b;
                letter-spacing: 0.12em;
                font-size: 0.95rem;
                margin-bottom: 12px;
            }

            .testimonial-card p {
                margin: 0 0 16px;
                color: var(--muted);
                line-height: 1.75;
            }

            .profile {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .profile img {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                object-fit: cover;
            }

            .profile strong {
                display: block;
                font-size: 0.95rem;
            }

            .profile small {
                color: var(--muted);
            }

            .cta {
                padding: 56px 0 80px;
            }

            .cta-box {
                background: linear-gradient(135deg, #0f172a, #1d4ed8 50%, #0ea5a4);
                border-radius: 30px;
                padding: clamp(26px, 5vw, 50px);
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                color: white;
                box-shadow: 0 30px 60px rgba(29,78,216,0.28);
            }

            .cta-box h2 {
                margin: 0 0 10px;
                font-size: clamp(2rem, 4vw, 3rem);
                letter-spacing: -0.06em;
            }

            .cta-box p {
                margin: 0;
                color: rgba(255,255,255,0.75);
                line-height: 1.7;
            }

            footer {
                padding: 20px 0 50px;
            }

            .footer-wrap {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                align-items: center;
                border-top: 1px solid var(--line);
                padding-top: 24px;
                color: var(--muted);
            }

            .footer-links {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
            }

            .footer-links a {
                color: var(--muted);
            }

            @media (max-width: 980px) {
                .nav-links {
                    display: none;
                }

                .hero-grid,
                .solution-layout,
                .feature-grid,
                .modules-grid,
                .pricing-grid,
                .testimonial-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .hero-grid {
                    grid-template-columns: 1fr;
                }

                .floating-card {
                    position: static;
                    margin-top: 18px;
                    width: 100%;
                }

                .brands-row {
                    grid-template-columns: repeat(3, minmax(0,1fr));
                }
            }

            @media (max-width: 640px) {
                .nav {
                    padding: 14px 0;
                }

                .nav-actions {
                    gap: 8px;
                }

                .btn {
                    padding: 0.72rem 1rem;
                    font-size: 0.88rem;
                }

                .hero {
                    padding-top: 38px;
                }

                .feature-grid,
                .solution-layout,
                .modules-grid,
                .pricing-grid,
                .testimonial-grid,
                .brands-row {
                    grid-template-columns: 1fr;
                }

                .section-head {
                    display: block;
                }

                .cta-box {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .footer-wrap {
                    flex-direction: column;
                    align-items: flex-start;
                }
            }
        </style>
    </head>
    <body>
        <header class="topbar">
            <div class="container nav">
                <a href="#inicio" class="brand" aria-label="Northstar Finance">
                    <span class="brand-mark">N</span>
                    <span>Northstar Finance</span>
                </a>

                <nav class="nav-links" aria-label="Menú principal">
                    <a href="#inicio">Inicio</a>
                    <a href="#soluciones">Soluciones</a>
                    <a href="#modulos">Módulos</a>
                    <a href="#planes">Planes</a>
                    <a href="#testimonios">Clientes</a>
                    <a href="#contacto">Contacto</a>
                </nav>

                <div class="nav-actions">
                    <a href="{{ route('login') }}" class="btn btn-outline">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Probar demo</a>
                </div>
            </div>
        </header>

        <main id="inicio">
            <section class="hero">
                <div class="container hero-grid">
                    <div class="hero-copy">
                        <span class="badge">● Plataforma financiera del futuro</span>
                        <h1>Controla tu dinero con claridad y velocidad.</h1>
                        <p>
                            Centraliza cuentas, pagos, presupuestos, inversiones y analítica financiera en una sola plataforma
                            diseñada para acelerar decisiones y proteger el flujo de efectivo de tu negocio.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                            <a href="#soluciones" class="btn btn-outline">Ver cómo funciona</a>
                        </div>

                        <div class="mini-proof">
                            <div class="item"><span class="dot"></span> 12.000+ usuarios activos</div>
                            <div class="item"><span class="dot"></span> 99.98% de uptime</div>
                            <div class="item"><span class="dot"></span> 47% menos tiempo operativo</div>
                        </div>
                    </div>

                    <div class="hero-visual" aria-label="Dashboard financiero ilustrativo">
                        <div class="dashboard-card">
                            <div class="hero-window">
                                <div class="window-top">
                                    <span class="window-circle"></span>
                                    <span class="window-circle"></span>
                                    <span class="window-circle"></span>
                                </div>

                                <div class="stats-row">
                                    <div class="stat-box">
                                        <small>Ingresos</small>
                                        <strong>$84.2K</strong>
                                    </div>
                                    <div class="stat-box">
                                        <small>Gastos</small>
                                        <strong>$42.9K</strong>
                                    </div>
                                    <div class="stat-box">
                                        <small>ROI</small>
                                        <strong>+21.8%</strong>
                                    </div>
                                </div>

                                <div class="chart">
                                    <strong style="color:#fff; font-size:0.82rem; letter-spacing:0.06em; text-transform:uppercase;">Evolución financiera</strong>
                                    <div class="bars" aria-hidden="true">
                                        <span class="bar" style="height:35%"></span>
                                        <span class="bar" style="height:52%"></span>
                                        <span class="bar" style="height:63%"></span>
                                        <span class="bar" style="height:88%"></span>
                                        <span class="bar" style="height:72%"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="floating-card">
                            <h4>Meta de caja</h4>
                            <div class="progress"><span></span></div>
                            <p style="margin:12px 0 0; font-weight:700; color:var(--text);">78% completado</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="brands">
                <div class="container">
                    <div class="brands-row">
                        <div class="brand-pill">Apex</div>
                        <div class="brand-pill">NovaPay</div>
                        <div class="brand-pill">Crest</div>
                        <div class="brand-pill">Metrica</div>
                        <div class="brand-pill">Lumina</div>
                    </div>
                </div>
            </section>

            <section id="soluciones">
                <div class="container">
                    <div class="section-head">
                        <h2>Todo lo que tu empresa necesita para crecer.</h2>
                        <p>Una suite financiera pensada para equipos de ventas, finanzas, operaciones y dirección con visibilidad total.</p>
                    </div>

                    <div class="feature-grid">
                        <article class="feature-card">
                            <div class="icon-wrap">💳</div>
                            <h3>Pagos y cobranza</h3>
                            <p>Automatiza facturas, cobros recurrentes y conciliación bancaria con alertas inteligentes.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap">📊</div>
                            <h3>Analytics en tiempo real</h3>
                            <p>Monitorea indicadores clave de liquidez, rentabilidad y flujo de caja en un panel central.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap">🛡️</div>
                            <h3>Control de riesgos</h3>
                            <p>Detecta anomalías, evita fraudes y supervisa movimientos con políticas de acceso avanzadas.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap">📈</div>
                            <h3>Planeación financiera</h3>
                            <p>Modela escenarios, pronósticos y presupuestos con visualizaciones claras y simples.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section>
                <div class="container solution-layout">
                    <div class="solution-photo">
                        <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=1200&q=80" alt="Equipo revisando datos financieros" style="height:100%; min-height:520px; object-fit:cover;">
                    </div>

                    <div class="solution-content">
                        <div>
                            <span class="badge" style="background: rgba(59,130,246,0.08); color:#1d4ed8; border-color: rgba(59,130,246,0.12);">Por qué elegir Northstar</span>
                            <h2 style="font-size: clamp(2rem, 3vw, 3rem); letter-spacing: -0.05em; margin: 18px 0;">Más control, menos complejidad.</h2>
                        </div>

                        <div class="check-list">
                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Dashboards financieros unificados</strong>
                                    <span>Consolida bancos, tarjetas, cuentas por cobrar y por pagar en una sola vista.</span>
                                </div>
                            </div>

                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Automatización de procesos</strong>
                                    <span>Reduce la carga manual con flujos de aprobación, pagos automáticos y alertas.</span>
                                </div>
                            </div>

                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Seguridad empresarial</strong>
                                    <span>Permisos por rol, auditoría completa y cifrado para cuidar cada operación.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="modulos">
                <div class="container">
                    <div class="section-head">
                        <h2>Módulos para cada área de tu negocio.</h2>
                        <p>Diseñado para equipos pequeños, medianos y corporativos que quieren tomar decisiones con base financiera.</p>
                    </div>

                    <div class="modules-grid">
                        <article class="module-card">
                            <span class="module-pill">Finanzas</span>
                            <h3>Cuenta general</h3>
                            <p>Visualiza saldos, movimientos y tendencias de cada cuenta en tiempo real.</p>
                            <a href="#">Explorar módulo →</a>
                        </article>

                        <article class="module-card">
                            <span class="module-pill">Cobranza</span>
                            <h3>Facturación</h3>
                            <p>Genera facturas, programaciones y recordatorios para mejorar la liquidación de tus ingresos.</p>
                            <a href="#">Explorar módulo →</a>
                        </article>

                        <article class="module-card">
                            <span class="module-pill">Gestión</span>
                            <h3>Presupuestos</h3>
                            <p>Define objetivos, compara presupuestos reales vs planificados y corrige desviaciones.</p>
                            <a href="#">Explorar módulo →</a>
                        </article>
                    </div>
                </div>
            </section>

            <section id="planes">
                <div class="container">
                    <div class="section-head">
                        <h2>Precios que se adaptan a tu etapa.</h2>
                        <p>Desde startups que necesitan orden hasta empresas con procesos financieros complejos.</p>
                    </div>

                    <div class="pricing-grid">
                        <article class="pricing-card">
                            <h3>Starter</h3>
                            <div class="price"><strong>$29</strong><span>/mes</span></div>
                            <div class="price-sub">Ideal para emprendedores y negocios pequeños.</div>
                            <ul>
                                <li>2 usuarios</li>
                                <li>Dashboard financiero</li>
                                <li>Facturas y pagos básicos</li>
                                <li>Soporte estándar</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn btn-outline" style="width:100%;">Elegir Starter</a>
                        </article>

                        <article class="pricing-card featured">
                            <h3>Growth</h3>
                            <div class="price"><strong>$79</strong><span>/mes</span></div>
                            <div class="price-sub">La mejor opción para equipos en crecimiento.</div>
                            <ul>
                                <li>Usuarios ilimitados</li>
                                <li>Automatización y alertas</li>
                                <li>Presupuestos avanzados</li>
                                <li>Integraciones bancarias</li>
                            </ul>
                            <a href="{{ route('register') }}" class="btn btn-primary" style="width:100%;">Elegir Growth</a>
                        </article>

                        <article class="pricing-card">
                            <h3>Enterprise</h3>
                            <div class="price"><strong>Custom</strong></div>
                            <div class="price-sub">Solución personalizada para organizaciones complejas.</div>
                            <ul>
                                <li>Multiempresa</li>
                                <li>Seguridad avanzada</li>
                                <li>Soporte premium</li>
                                <li>Consultoría financiera</li>
                            </ul>
                            <a href="#contacto" class="btn btn-outline" style="width:100%;">Contactar ventas</a>
                        </article>
                    </div>
                </div>
            </section>

            <section id="testimonios">
                <div class="container">
                    <div class="section-head">
                        <h2>Clientes que ya transformaron su operación.</h2>
                        <p>Más de 2.000 equipos financieros confían en Northstar para operar con mayor claridad y previsión.</p>
                    </div>

                    <div class="testimonial-grid">
                        <article class="testimonial-card">
                            <div class="stars">★★★★★</div>
                            <p>“Redujimos a la mitad el tiempo de cierre financiero y ahora cada área trabaja con la misma fuente de verdad.”</p>
                            <div class="profile">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&q=80" alt="María Pérez">
                                <div>
                                    <strong>María Pérez</strong>
                                    <small>Controller, Atlas Labs</small>
                                </div>
                            </div>
                        </article>

                        <article class="testimonial-card">
                            <div class="stars">★★★★★</div>
                            <p>“La claridad en flujo de caja cambió cómo tomamos decisiones: más rápidos, más seguros y más eficientes.”</p>
                            <div class="profile">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80" alt="Daniel Ruiz">
                                <div>
                                    <strong>Daniel Ruiz</strong>
                                    <small>Director financiero, BVX</small>
                                </div>
                            </div>
                        </article>

                        <article class="testimonial-card">
                            <div class="stars">★★★★★</div>
                            <p>“La integración con pagos y presupuestos nos permitió crecer sin sumar más fricción operativa.”</p>
                            <div class="profile">
                                <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=200&q=80" alt="Sofía Junior">
                                <div>
                                    <strong>Sofía Junior</strong>
                                    <small>COO, Veridian</small>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="cta" id="contacto">
                <div class="container">
                    <div class="cta-box">
                        <div>
                            <h2>Más control, menos riesgos.</h2>
                            <p>Impulsa tus decisiones financieras con una plataforma diseñada para crecer contigo.</p>
                        </div>
                        <a href="{{ route('register') }}" class="btn btn-primary" style="white-space:nowrap; background:white; color:#0f172a; box-shadow:none;">Solicitar demo</a>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="container footer-wrap">
                <div>© 2026 Northstar Finance. Todos los derechos reservados.</div>
                <div class="footer-links">
                    <a href="#inicio">Inicio</a>
                    <a href="#soluciones">Soluciones</a>
                    <a href="#planes">Planes</a>
                    <a href="#contacto">Contacto</a>
                </div>
            </div>
        </footer>
    </body>
</html>
