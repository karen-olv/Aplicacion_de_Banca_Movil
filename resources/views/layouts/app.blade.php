<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bankario - Banca Móvil')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --background: oklch(0.99 0 0);
            --foreground: oklch(0.15 0 0);
            --card: oklch(1 0 0);
            --card-foreground: oklch(0.15 0 0);
            --primary: oklch(0.15 0 0);
            --primary-foreground: oklch(0.99 0 0);
            --secondary: oklch(0.96 0 0);
            --secondary-foreground: oklch(0.15 0 0);
            --muted: oklch(0.97 0 0);
            --muted-foreground: oklch(0.45 0 0);
            --accent: oklch(0.35 0.08 240);
            --accent-foreground: oklch(0.99 0 0);
            --border: oklch(0.92 0 0);
            --input: oklch(0.96 0 0);
            --ring: oklch(0.15 0 0);
        }

        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .bg-background { background-color: var(--background); }
        .bg-card { background-color: var(--card); }
        .bg-primary { background-color: var(--primary); }
        .bg-secondary { background-color: var(--secondary); }
        .bg-muted { background-color: var(--muted); }
        .bg-input { background-color: var(--input); }

        .text-foreground { color: var(--foreground); }
        .text-card-foreground { color: var(--card-foreground); }
        .text-primary-foreground { color: var(--primary-foreground); }
        .text-muted-foreground { color: var(--muted-foreground); }

        .border-border { border-color: var(--border); }
        .border-foreground { border-color: var(--foreground); }

        .focus\:border-foreground:focus { border-color: var(--foreground); }
        .hover\:bg-primary\/90:hover { background-color: var(--primary); opacity: 0.9; }
        .hover\:text-foreground:hover { color: var(--foreground); }
        .hover\:border-foreground:hover { border-color: var(--foreground); }

        /* Estilos tipo Bootstrap para que nav-item/nav-link se vean coherentes */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0.75rem 1rem;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1rem;
            color: var(--foreground);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 1rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--foreground);
            font-size: 0.9rem;
            text-decoration: none;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .logout-button {
            background: transparent;
            border: none;
            padding: 0;
            font-size: 0.9rem;
            cursor: pointer;
            color: var(--foreground);
            text-decoration: none;
        }

        .logout-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-background text-foreground">

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="navbar-brand">
            Bankario
        </div>

        <ul class="navbar-nav">
            {{-- Links comunes visibles siempre --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('transferencias.index') }}">Transferencias</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('perfil') }}">Mi Perfil</a>
            </li>

            {{-- Área pública: Login / Register cuando NO hay sesión --}}
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endguest

            {{-- === BLOQUE QUE ME PEDISTE AGREGAR DESPUÉS DE "Login" / "Register" === --}}
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
            </li>
            @endauth
            {{-- === FIN DEL BLOQUE NUEVO === --}}

            {{-- Logout cuando SÍ hay sesión --}}
            @auth
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        Cerrar sesión
                    </button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>

    {{-- CONTENIDO PRINCIPAL DINÁMICO --}}
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
