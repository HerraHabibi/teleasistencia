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
    
    <body id="body" class="login-body">

        <div class="login-container">
            
            <form method="post" action="{{ route('login.submit') }}" class="login-box">
                <h2 class="pb-1 title-session">Iniciar sesión</h2>
                @csrf
                <div class="form-log form-m1">
                    <label for="search">E-mail</label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        class="search-text" 
                        placeholder="Escribe aquí" 
                    />
                    @if ($errors->any())
                        <div class="alertaaa alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-log form-m2">
                    <label for="password">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="search-text" 
                        placeholder="Escribe aquí" 
                    />
                    <div class="input-group-append">
                        <span class="input-group-text icon"></span>
                    </div>
                    
                </div>
                <button type="submit" class="red-btn-log">Continuar</button>
            </form>
        </div>
    </body>
    <header class="cerrar-sess">
        <a href="{{ route('register') }}" class="click-layout">Registrarse</a>
    </header>
</html>