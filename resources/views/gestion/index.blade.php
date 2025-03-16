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
            <table class="custom-table" width="880px" border="0" class="index">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell">
                            <a href="{{ route('gestion.altabeneficiario') }}" class="click">
                                <img src="{{ asset('images/nuevo-usuario.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Alta de nuevo beneficiario</p>
                            </a>
                        </td>
                        <td class="custom-cell"><a href="{{ route('gestion.actualizar') }}" class="click"><img
                                    src="{{ asset('images/editar-usuario.png') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Modificar beneficiario</p>
                            </a></td>
                        <td class="custom-cell">
                            <a href="{{ route('gestion.contactos') }}" class="click">
                                <img src="{{ asset('images/nuevo-contacto.png') }}" alt="Contactos" border="0"
                                    class="img-index">
                                <p>Asignación de personas de contacto</p>
                            </a></td>
                        <td class="custom-cell"><a href="{{route('gestion.contactos.buscar.mod')}}" class="click"><img
                                    src="{{ asset('images/modificar-contacto.png') }}" alt="Contactos" border="0"
                                    class="img-index">
                                <p>Mofidicación de personas de contacto</p>
                            </a></td>
                    </tr>
                </tbody>
            </table>
            <table class="custom-table" width="880px" border="0" class="index">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell"><a href="{{ route('gestion.interes') }}" class="click"><img
                                    src="{{ asset('images/datos-interes.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Datos de interés del beneficiario</p>
                            </a></td>
                        <td class="custom-cell"><a href="{{ route('gestion.interes.buscar.modificar') }}" class="click"><img
                                    src="{{ asset('images/modificar-datos-interes.png') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Modificación de datos de interes del beneficiario</p>
                            </a></td>
                            <td class="custom-cell">
                                <a href="{{ route('gestion.borrar.beneficiario.form') }}" class="click">
                                    <img src="{{ asset('images/borrar-usuario.png') }}" border="0" class="img-index">
                                    <p>Dar de baja a un beneficiario (usar con precaución)</p>
                                </a>
                            </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>
