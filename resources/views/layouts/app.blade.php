<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Sistema de Teleasistencia - Acceso a usuarios')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @vite(['resources/css/app.css', 'resources/css/custom.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light min-vh-100 d-flex flex-column">

    @if (Auth::check() && !request()->routeIs('login'))
    <header class="shadow-sm py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="dropdown">
            @if (Auth::check())
                <a class="btn btn-link dropdown-toggle user-btn" href="#" role="button" id="userDropdown"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2"></i>
                    {{ Auth::user()->name }} -
                    @if (Auth::user()->perfil == 0)
                        Usuario
                    @else
                        Profe
                    @endif
                </a>
    
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0 px-3">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            @endif
        </div>
    
        <div>
            <a href="{{ route('home') }}" class="btn btn-outline-light btn-lg fw-bold start-btn shadow-sm">
                <i class="bi bi-house-door-fill me-2"></i> Inicio
            </a>
        </div>
        
        
    </header>
    
    
@endif

    

    <main class="container py-5 flex-grow-1">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
