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
                <h2>Evaluación</h2>
            </div>
            <p>Volver al <a href="{{ route('home') }}">Inicio</a></p>
            <table class="custom-table" width="880px" border="0" class="index">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell">
                            <a href="{{ route('evaluar.usuario') }}" class="click">
                                <img src="{{ asset('images/1.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Evaluar usuario(Como teleoperador)</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('evaluar.teleoperador') }}" class="click"><img
                                    src="{{ asset('images/2.png') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Evaluar teleoperador(Como usuario)</p>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>
