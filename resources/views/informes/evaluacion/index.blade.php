@extends('layouts.app')

@section('title', 'Evaluación')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-5">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center">
        <h2 class="fw-bold mb-0">Evaluación</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 text-center">
        <a href="{{ route('evaluar.teleoperador') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/2.png') }}" alt="Evaluar a teleoperador" class="img-fluid mb-2" />
            <p>Evaluar a teleoperador</p>
        </a>
    </div>

    @if (Auth::user()->perfil == 1)
    <div class="col-12 col-sm-6 col-md-4 text-center">
        <a href="{{ route('evaluar.verTeleoperador') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/ver-evaluaciones.png') }}" alt="Ver evaluaciones" class="img-fluid mb-2" />
            <p>Ver evaluaciones</p>
        </a>
    </div>
    @endif
</div>

@endsection
