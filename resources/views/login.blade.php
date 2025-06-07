@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="login-wrapper d-flex justify-content-center align-items-center min-vh-75">
    <form method="POST" action="{{ route('login.submit') }}" class="login-form p-5 rounded shadow bg-white">
        <h2 class="mb-5 fw-bold text-center text-primary display-4">Iniciar sesión</h2>
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label fw-semibold text-secondary fs-4">E-mail</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control form-control-lg" 
                placeholder="Escribe aquí" 
                required
                autofocus
            />
            @if ($errors->has('email'))
                <div class="text-danger small mt-2 fs-6">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="mb-5">
            <label for="password" class="form-label fw-semibold text-secondary fs-4">Contraseña</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control form-control-lg" 
                placeholder="Escribe aquí" 
                required
            />
            @if ($errors->has('password'))
                <div class="text-danger small mt-2 fs-6">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold shadow-sm">Continuar</button>
    </form>
</div>

<div class="text-center mt-5">
    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-5 py-3 rounded fw-semibold shadow-sm text-decoration-none">
        ¿No tienes cuenta? Regístrate
    </a>
</div>
@endsection
