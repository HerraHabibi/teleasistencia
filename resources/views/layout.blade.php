<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teleasistencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        use Illuminate\Support\Facades\Vite;
    @endphp
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}">
    <script type="module" src="{{ Vite::asset('resources/js/app.js') }}"></script>
</head>
<body id="body">
    <header class="header">
        <h2>@yield('seccion')</h2>
        <h1 class="header-title">@yield('title')</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <h2><a href="@yield('ruta_volver')" class="click-layout">Volver</a></h2>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>