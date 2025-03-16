<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teleasistencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body id="body">
    <header class="header">
        <h2>@yield('seccion')</h2>
        <h1 class="header-title">@yield('title')</h1>

        <h2><a href="@yield('ruta_volver')" class="click-layout">Volver</a></h2>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>
