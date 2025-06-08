@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="text-center titulo">
        <h2 class="fw-bold m-0 nombre mx-auto">Inicio</h2>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{ route('gestion.index') }}" class="text-center text-decoration-none d-block h-100 card-link">
                <img src="{{ asset('images/re.png') }}" alt="Gestión de usuarios" class="img-fluid mb-2" />
                <p>Gestión de usuarios</p>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{ route('entrantes.index') }}" class="text-center text-decoration-none d-block h-100 card-link">
                <img src="{{ asset('images/tlf.png') }}" alt="Llamadas" class="img-fluid mb-2" />
                <p>Llamadas</p>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{ route('informes.index') }}" class="text-center text-decoration-none d-block h-100 card-link">
                <img src="{{ asset('images/ficha-informe.png') }}" alt="Informes" class="img-fluid mb-2" />
                <p>Informes</p>
            </a>
        </div>
    </div>

    @if (Auth::user()->perfil == 1)
        <div class="row g-4 justify-content-center mt-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('usuarios') }}" class="text-center text-decoration-none d-block h-100 card-link">
                    <img src="{{ asset('images/lista-usuarios.png') }}" alt="Lista de usuarios" class="img-fluid mb-2" />
                    <p>Lista de usuarios</p>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('audios.index') }}" class="text-center text-decoration-none d-block h-100 card-link">
                    <img src="{{ asset('images/lista-audios.png') }}" alt="Lista de audios" class="img-fluid mb-2" />
                    <p>Lista de audios</p>
                </a>
            </div>
        </div>
    @endif
@endsection
