<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Financiero</title>
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
                width: min(1500px, calc(100% - 72px));
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

            .brand-logo {
                width: 42px;
                height: 42px;
                object-fit: contain;
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
                background: var(--primary-soft);
                color: #fff;
                box-shadow: 0 8px 18px rgba(29, 78, 216, 0.18);
            }

            .btn-primary:hover {
                background: #1e40af;
                box-shadow: 0 10px 22px rgba(29, 78, 216, 0.24);
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

            .badge-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: var(--secondary);
                flex: 0 0 8px;
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

            .hero-photo {
                width: 100%;
                height: 520px;
                border-radius: 28px;
                object-fit: cover;
                object-position: center;
                box-shadow: var(--shadow);
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
                margin-bottom: 16px;
            }

            .card-icon {
                width: 25px;
                height: 25px;
                stroke: currentColor;
                stroke-width: 1.7;
                stroke-linecap: round;
                stroke-linejoin: round;
                fill: none;
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
                background: #0f172a;
                border-left: 6px solid var(--secondary);
                border-radius: 30px;
                padding: clamp(26px, 5vw, 50px);
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                color: white;
                box-shadow: 0 30px 60px rgba(29,78,216,0.28);
            }

            html.reveal-ready [data-reveal] {
                opacity: 0;
                transform: translateY(24px);
                transition: opacity 650ms ease, transform 650ms cubic-bezier(0.2, 0.7, 0.2, 1);
            }

            html.reveal-ready [data-reveal].is-visible {
                opacity: 1;
                transform: translateY(0);
            }

            .feature-card:nth-child(2),
            .module-card:nth-child(2) { transition-delay: 80ms; }

            .feature-card:nth-child(3),
            .module-card:nth-child(3) { transition-delay: 160ms; }

            .feature-card:nth-child(4) { transition-delay: 240ms; }

            @media (prefers-reduced-motion: reduce) {
                html { scroll-behavior: auto; }

                html.reveal-ready [data-reveal] {
                    opacity: 1;
                    transform: none;
                    transition: none;
                }
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

                .container {
                    width: calc(100% - 32px);
                }

                .hero-photo {
                    height: 360px;
                    border-radius: 20px;
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
                <a href="#inicio" class="brand" aria-label="Sistema Financiero">
                    <img class="brand-logo" src="{{ asset('logo/logo.png') }}" alt="">
                    <span>Sistema Financiero</span>
                </a>

                <nav class="nav-links" aria-label="Menú principal">
                    <a href="#inicio">Inicio</a>
                    <a href="#soluciones">Clientes</a>
                    <a href="#modulos">Préstamos</a>
                    <a href="#cuotas">Cuotas</a>
                    <a href="#reportes">Reportes</a>
                    <a href="#contacto">Contacto</a>
                </nav>

                <div class="nav-actions">
                    <a href="{{ route('login') }}" class="btn btn-outline">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                </div>
            </div>
        </header>

        <main id="inicio">
            <section class="hero">
                <div class="container hero-grid">
                    <div class="hero-copy">
                        <span class="badge"><span class="badge-dot"></span> Sistema de gestión crediticia</span>
                        <h1>Administra clientes, préstamos y cobranzas desde un solo sistema.</h1>
                        <p>
                            Registra clientes, controla préstamos, organiza planes de cuotas y registra pagos con trazabilidad
                            para cada operación de ASSCOMPANY S.R.L.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                            <a href="#modulos" class="btn btn-outline">Ver módulos</a>
                        </div>

                        <div class="mini-proof">
                            <div class="item"><span class="dot"></span> Gestión de clientes</div>
                            <div class="item"><span class="dot"></span> Seguimiento de cuotas</div>
                            <div class="item"><span class="dot"></span> Registro auditable</div>
                        </div>
                    </div>

                    <div class="hero-visual">
                        <img class="hero-photo" src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1200&q=80" alt="Asesoría financiera entre clientes y equipo de trabajo">

                        <div class="floating-card">
                            <h4>Gestión de crédito</h4>
                            <p style="margin:0; font-weight:700; color:var(--text);">Clientes · Préstamos · Cuotas</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="brands">
                <div class="container">
                    <div class="brands-row">
                        <div class="brand-pill">Clientes</div>
                        <div class="brand-pill">Préstamos</div>
                        <div class="brand-pill">Cuotas</div>
                        <div class="brand-pill">Cobranzas</div>
                        <div class="brand-pill">Auditoría</div>
                    </div>
                </div>
            </section>

            <section id="soluciones">
                <div class="container">
                    <div class="section-head">
                        <h2>Todo el ciclo del crédito, bajo control.</h2>
                        <p>Consulta la información de clientes y acompaña cada préstamo desde su registro hasta el último pago.</p>
                    </div>

                    <div class="feature-grid">
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                            <h3>Clientes</h3>
                            <p>Organiza identificación, contacto y estado crediticio en una ficha centralizada.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h6M7 16h4M16 14l2 2 3-4"/></svg></div>
                            <h3>Préstamos</h3>
                            <p>Registra montos, intereses, plazos, frecuencias de pago y estado de cada operación.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M8 14h2M14 14h2M8 18h2"/></svg></div>
                            <h3>Plan de cuotas</h3>
                            <p>Consulta vencimientos, capital, intereses y estado de pago de cada cuota.</p>
                        </article>

                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="M2.5 9h19M16 14h2M6 15h4"/></svg></div>
                            <h3>Cobranzas</h3>
                            <p>Registra pagos por efectivo, transferencia o QR con comprobante y responsable asignado.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section>
                <div class="container solution-layout">
                    <div class="solution-photo">
                        <img src="https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=1200&q=80" alt="Revisión de documentos y cálculos financieros para préstamos" style="height:100%; min-height:520px; object-fit:cover;">
                    </div>

                    <div class="solution-content">
                        <div>
                            <span class="badge" style="background: rgba(59,130,246,0.08); color:#1d4ed8; border-color: rgba(59,130,246,0.12);">ASSCOMPANY S.R.L.</span>
                            <h2 style="font-size: clamp(2rem, 3vw, 3rem); letter-spacing: -0.05em; margin: 18px 0;">Información clara en cada etapa del préstamo.</h2>
                        </div>

                        <div class="check-list">
                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Expediente del cliente</strong>
                                    <span>Consulta identificación, contacto y estado crediticio antes de registrar operaciones.</span>
                                </div>
                            </div>

                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Seguimiento de cuotas y pagos</strong>
                                    <span>Revisa vencimientos y pagos recibidos para identificar cuotas pendientes o vencidas.</span>
                                </div>
                            </div>

                            <div class="check-item">
                                <span class="check-icon">✓</span>
                                <div>
                                    <strong>Control por usuario y auditoría</strong>
                                    <span>Asigna roles y conserva un registro de acciones para dar seguimiento a cada cambio.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="modulos">
                <div class="container">
                    <div class="section-head">
                        <h2>Herramientas para operar el crédito.</h2>
                        <p>Accede a las funciones principales para registrar, administrar y dar seguimiento a la cartera.</p>
                    </div>

                    <div class="modules-grid">
                        <article class="module-card">
                            <span class="module-pill">Registro</span>
                            <h3>Clientes</h3>
                            <p>Administra identificación, contacto, dirección y clasificación crediticia.</p>
                            <a href="{{ route('login') }}">Ingresar al sistema →</a>
                        </article>

                        <article class="module-card">
                            <span class="module-pill">Cartera</span>
                            <h3>Préstamos y garantías</h3>
                            <p>Consulta monto, interés, plazo, frecuencia de pago y garantías asociadas.</p>
                            <a href="{{ route('login') }}">Ingresar al sistema →</a>
                        </article>

                        <article class="module-card">
                            <span class="module-pill">Cobranza</span>
                            <h3>Cuotas y pagos</h3>
                            <p>Da seguimiento a vencimientos, comprobantes, métodos de pago y saldos pendientes.</p>
                            <a href="{{ route('login') }}">Ingresar al sistema →</a>
                        </article>
                    </div>
                </div>
            </section>

            <section id="cuotas">
                <div class="container">
                    <div class="section-head">
                        <h2>Un seguimiento completo de cada cuota.</h2>
                        <p>Consulta los componentes del pago y su estado para facilitar la gestión diaria de cobranzas.</p>
                    </div>

                    <div class="feature-grid">
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M15 8.5c-.6-.7-1.5-1-3-1-1.7 0-2.7.8-2.7 2s1 1.8 2.7 2 2.7.7 2.7 2-1 2-2.7 2c-1.3 0-2.4-.4-3.1-1.2M12 5.5v13"/></svg></div>
                            <h3>Capital</h3>
                            <p>Revisa el monto de capital previsto para cada cuota del préstamo.</p>
                        </article>
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="7" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/><path d="m19 5-14 14"/></svg></div>
                            <h3>Interés</h3>
                            <p>Consulta el interés aplicado y el total a cobrar según el plan registrado.</p>
                        </article>
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M12 14v3l2 1"/></svg></div>
                            <h3>Vencimiento</h3>
                            <p>Identifica cuotas pendientes, pagadas, parciales o vencidas.</p>
                        </article>
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 3h14v18l-3-2-4 2-4-2-3 2zM8 8h8M8 12h8M8 16h4"/></svg></div>
                            <h3>Comprobantes</h3>
                            <p>Relaciona cada pago con su cuota, cobrador y número de comprobante.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="reportes">
                <div class="container">
                    <div class="section-head">
                        <h2>Control y trazabilidad para cada operación.</h2>
                        <p>La información de préstamos, pagos y usuarios queda organizada para facilitar revisiones y auditorías.</p>
                    </div>

                    <div class="feature-grid">
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/><path d="m9 12 2 2 4-4"/></svg></div>
                            <h3>Acceso por roles</h3>
                            <p>Separa las funciones de administración, cobranza y consulta de clientes.</p>
                        </article>
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 4h8M9 3h6v3H9zM6 5H4v16h16V5h-2M8 12h8M8 16h5"/></svg></div>
                            <h3>Bitácora de auditoría</h3>
                            <p>Conserva acciones, tablas afectadas, detalles del cambio e IP de origen.</p>
                        </article>
                        <article class="feature-card">
                            <div class="icon-wrap"><svg class="card-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 3v18h18M8 16v-4M13 16V7M18 16v-7"/></svg></div>
                            <h3>Estado de cartera</h3>
                            <p>Organiza operaciones activas, pendientes, canceladas y en mora.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="cta" id="contacto">
                <div class="container">
                    <div class="cta-box">
                        <div>
                            <h2>Gestiona tu cartera con claridad.</h2>
                            <p>Ingresa al sistema para administrar clientes, préstamos y cobranzas.</p>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-primary" style="white-space:nowrap; background:white; color:#0f172a; box-shadow:none;">Ingresar al sistema</a>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="container footer-wrap">
                <div>© 2026 ASSCOMPANY S.R.L. Sistema de Control Financiero.</div>
                <div class="footer-links">
                    <a href="#inicio">Inicio</a>
                    <a href="#soluciones">Clientes</a>
                    <a href="#cuotas">Cuotas</a>
                    <a href="#contacto">Contacto</a>
                </div>
            </div>
        </footer>
        <script>
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                const revealItems = document.querySelectorAll('main section, .feature-card, .module-card, .check-item');

                document.documentElement.classList.add('reveal-ready');

                if ('IntersectionObserver' in window) {
                    const revealObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('is-visible');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });

                    revealItems.forEach((item) => {
                        item.dataset.reveal = '';
                        revealObserver.observe(item);
                    });
                } else {
                    revealItems.forEach((item) => item.classList.add('is-visible'));
                }
            }
        </script>
    </body>
</html>
