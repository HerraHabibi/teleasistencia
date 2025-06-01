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
    <div class="bloque-gestion">
        <form class="formoid-solid-red" method="post" action="index.php" enctype="multipart/form-data">
            <div class="title" style="position: relative; display: flex; align-items: center; justify-content: center;">
                <a href="{{ route('home') }}" title="Volver al inicio" class="back-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                    </svg>
                </a>
                <h2 style="margin: 0;">Llamadas</h2>
            </div>

            <table width="880px" border="0" class="index custom-table">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell">
                            <a href="{{ route('entrantes.create') }}" class="click">
                                <img src="{{ asset('images/llamada-entrante.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Llamada entrante</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('salientes.create') }}" class="index-click">
                                <img src="{{ asset('images/llamada-saliente.png') }}" alt="Llamadas Salientes" border="0" class="img-index">
                                <p>Llamadas Salientes</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('entrantes.cita') }}" class="click">
                                <img src="{{ asset('images/registrar-cita.png') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Registrar citas</p>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </form>
    </div>
</body>

</html>
