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
            <div class="title">
                <h2>Gestión</h2>
            </div>
            <p>Volver al <a href="{{ route('home') }}">Inicio</a></p>
            <table width="880px" border="0"class="index">
                <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('gestion.index') }}" class="click">
                                <img src="{{ asset('images/llamada-saliente.png') }}" alt="Gestión de usuarios" border="0"
                                    class="img-index">
                                <p>Llamada saliente</p>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('gestion.index') }}" class="click">
                                <img src="{{ asset('images/alta.png') }}" alt="Gestión de usuarios" border="0"
                                    class="img-index">
                                <p>Llamada saliente rutinaria por la mañana</p>
                            </a>
                        </td>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>
