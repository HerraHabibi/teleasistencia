@extends('layouts.app')

@section('title', 'Registro usuario')

@section('content')
<div class="register-wrapper d-flex justify-content-center align-items-center min-vh-75">
    <form method="POST" action="{{ route('register') }}" class="login-form p-5 rounded shadow" style="max-width: 600px; width: 100%;">
        <h2 class="mb-5 fw-bold text-center text-primary display-4">Crear cuenta</h2>
        @csrf

        <div class="form-row d-flex flex-wrap gap-4">
            <div class="form-group flex-fill" style="min-width: 45%;">
                <label for="name" class="form-label fw-semibold text-secondary fs-4">Nombre</label>
                <input id="name" type="text" name="name" class="form-control form-control-lg" placeholder="Nombre" required autofocus value="{{ old('name') }}">
            </div>

            <div class="form-group flex-fill" style="min-width: 45%;">
                <label for="email" class="form-label fw-semibold text-secondary fs-4">Correo Electrónico</label>
                <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="Correo Electrónico" required value="{{ old('email') }}">
            </div>

            <div class="form-group flex-fill" style="min-width: 45%;">
                <label for="password" class="form-label fw-semibold text-secondary fs-4">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" required autocomplete="new-password">
            </div>

            <div class="form-group flex-fill" style="min-width: 45%;">
                <label for="password_confirmation" class="form-label fw-semibold text-secondary fs-4">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirmar Contraseña" required>
            </div>
        </div>

        <div class="form-group mt-4" style="max-width: 300px; margin: 2rem auto 0;">
            <label for="fecha_nacimiento" class="form-label fw-semibold text-secondary fs-4">Fecha de Nacimiento</label>
            <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="form-control form-control-lg" required value="{{ old('fecha_nacimiento') }}">
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold shadow-sm mt-5">Registrarse</button>

        <!-- Botón para ir al login -->
        <a href="{{ route('login') }}" 
           class="btn btn-outline-secondary btn-lg w-100 fw-semibold shadow-sm mt-3 text-center d-block">
            ¿Ya tienes cuenta? Iniciar sesión
        </a>
    </form>
</div>
@endsection
