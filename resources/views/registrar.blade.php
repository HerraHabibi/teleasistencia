@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Registro usuario')
@section('content')
@section('ruta_volver', route('login'))
    <form method="POST" action="{{ route('register') }}" class="beneficiary-form">
        @csrf
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" placeholder="Nombre" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" placeholder="Correo Electrónico" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            </div>

        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Registrarse</button>
        </div>
    </form>
@endsection
