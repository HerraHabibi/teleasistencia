<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Sistema de Teleasistencia - Acceso a usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<body>
    <header class="cerrar-sess">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </header>
    
    <div class="bloque-index">
    <form class="formoid-solid-red" method="post" action="index.php" enctype="multipart/form-data">
        <div class="title">
            <h2>Sistema de Teleasistencia</h2>
        </div>
        <p>Estás identificado como {{ Auth::user()->name }} -   
            @if (Auth::user()->perfil == 0)
                Usuario
            @else
                Profe
            @endif
        </p>
        <table class="custom-table" width="880px" border="0">
            <tbody>
                <tr class="custom-row">
                    <td class="custom-cell">
                        <a href="{{ route('gestion.index') }}" class="index-click">
                            <img src="{{ asset('images/nuevo-usuario.png') }}" alt="Gestión de Usuarios" border="0" class="img-index">
                            <p>Gestión de Usuarios</p>
                        </a>
                    </td>
                    <td class="custom-cell">
                        <a href="{{ route('entrantes.index') }}" class="index-click">
                            <img src="{{ asset('images/llamada-entrante.png') }}" alt="Llamadas Entrantes" border="0" class="img-index">
                            <p>Llamadas</p>
                        </a>
                    </td>
                    
                    <td class="custom-cell">
                        <a href="{{ route('informes.index') }}" class="index-click">
                            <img src="{{ asset('images/ficha-informe.png') }}" alt="Informes" border="0" class="img-index">
                            <p>Informes</p>
                        </a>
                    </td>

                
                </tr>
            </tbody>
        </table>
        @if (Auth::user()->perfil == 1)
        <table class="custom-table" width="880px" border="0">
            <tbody>
                <tr class="custom-row">
                    <td class="custom-cell">
                        <a href="{{ route('usuarios') }}" class="click">
                            <img src="{{ asset('images/lista-usuarios.png') }}" alt="Gestión de Usuarios" border="0" class="img-index">
                            <p>Lista de usuarios</p>
                        </a>
                    </td>
                    <td class="custom-cell">
                        <a href="{{ route('audios.index') }}" class="click">
                            <img src="{{ asset('images/lista-audios.png') }}" alt="Gestión de Usuarios" border="0" class="img-index">
                            <p>Lista de audios</p>
                        </a>
                    </td>

                
                </tr>
            </tbody>
        </table>
        @endif
    </form>
    </div>
</body>
</html>
