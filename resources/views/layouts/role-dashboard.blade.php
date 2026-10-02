<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | Sistema Financiero</title>
        <style>
            :root {
                --ink: #14211d;
                --muted: #64736d;
                --line: #dce7e1;
                --surface: #fff;
                --canvas: #f3f7f4;
                --accent: #147d64;
                --accent-soft: #e0f3ec;
            }

            * { box-sizing: border-box; }
            body { margin: 0; background: var(--canvas); color: var(--ink); font-family: Inter, 'Segoe UI', sans-serif; }
            a { color: inherit; text-decoration: none; }
            button, input { font: inherit; }

            .app-shell { min-height: 100vh; display: grid; grid-template-columns: 264px minmax(0, 1fr); }
            .sidebar { display: flex; flex-direction: column; gap: 32px; padding: 28px 20px; background: #14211d; color: #fff; }
            .brand { display: flex; align-items: center; gap: 12px; font-weight: 750; }
            .brand img { width: 52px; height: 52px; object-fit: contain; }
            .nav-label { margin: 0 12px 10px; color: #a6bab0; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; }
            .nav-links { display: grid; gap: 5px; }
            .nav-links a { padding: 11px 12px; border-radius: 9px; color: #d9e4de; font-size: 0.94rem; }
            .nav-links a:hover, .nav-links a[aria-current="page"] { background: rgba(255,255,255,0.1); color: #fff; }
            .sidebar-foot { margin-top: auto; display: grid; gap: 12px; color: #a6bab0; font-size: 0.82rem; }
            .sidebar-foot a { color: #fff; }

            .main-area { min-width: 0; }
            .topbar { min-height: 84px; display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px clamp(20px, 4vw, 56px); background: var(--surface); border-bottom: 1px solid var(--line); }
            .topbar p { margin: 0 0 4px; color: var(--muted); font-size: 0.82rem; }
            .topbar strong { font-size: 0.96rem; }
            .logout { border: 1px solid var(--line); border-radius: 8px; background: var(--surface); padding: 10px 14px; color: var(--ink); font-weight: 650; cursor: pointer; }
            .logout:hover { border-color: var(--accent); color: var(--accent); }
            .content { width: min(1440px, 100%); padding: 38px clamp(20px, 4vw, 56px) 56px; }
            .page-heading { margin-bottom: 28px; }
            .page-heading span { color: var(--accent); font-size: 0.77rem; font-weight: 750; text-transform: uppercase; }
            .page-heading h1 { margin: 8px 0 8px; font-size: clamp(1.8rem, 3vw, 2.6rem); letter-spacing: -0.035em; }
            .page-heading p { max-width: 720px; margin: 0; color: var(--muted); line-height: 1.65; }
            .panel-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
            .panel { padding: 22px; border: 1px solid var(--line); border-radius: 12px; background: var(--surface); }
            .panel h2, .panel h3 { margin: 0 0 10px; font-size: 1rem; }
            .panel p { margin: 0; color: var(--muted); line-height: 1.6; }
            .panel-link { display: inline-block; margin-top: 16px; color: var(--accent); font-weight: 700; }
            .empty-state { padding: 28px; border: 1px dashed #b9cbc1; border-radius: 12px; background: rgba(255,255,255,0.64); }
            .empty-state h2 { margin: 0 0 10px; font-size: 1.1rem; }
            .empty-state p { max-width: 700px; margin: 0; color: var(--muted); line-height: 1.7; }

            @media (max-width: 850px) {
                .app-shell { grid-template-columns: 1fr; }
                .sidebar { gap: 18px; padding: 14px 20px; }
                .brand img { width: 42px; height: 42px; }
                .nav-label, .sidebar-foot { display: none; }
                .nav-links { display: flex; gap: 4px; overflow-x: auto; padding-bottom: 2px; }
                .nav-links a { white-space: nowrap; }
                .panel-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            }

            @media (max-width: 560px) {
                .topbar { min-height: 68px; }
                .content { padding-top: 28px; }
                .panel-grid { grid-template-columns: 1fr; }
                .topbar strong { display: block; max-width: 180px; overflow: hidden; text-overflow: ellipsis; }
            }
        </style>
    </head>
    <body>
        <div class="app-shell">
            <aside class="sidebar">
                <a class="brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('logo/logo.png') }}" alt="">
                    <span>Sistema Financiero</span>
                </a>

                <div>
                    <p class="nav-label">@yield('role-label')</p>
                    <nav class="nav-links" aria-label="Navegación del panel">
                        @yield('navigation')
                    </nav>
                </div>

                <div class="sidebar-foot">
                    <a href="{{ route('landing') }}">Ir a la página principal</a>
                    <span>ASSCOMPANY S.R.L.</span>
                </div>
            </aside>

            <div class="main-area">
                <header class="topbar">
                    <div>
                        <p>Sesión iniciada como</p>
                        <strong>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</strong>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="logout" type="submit">Cerrar sesión</button>
                    </form>
                </header>

                <main class="content">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
