@extends('layouts.app')

@section('title', 'Llamadas')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Llamadas</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('entrantes.create') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamada-entrante.png') }}" alt="Registrar llamada entrante" class="img-fluid mb-2" />
            <p>Registrar llamada entrante</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('salientes.create') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamada-saliente.png') }}" alt="Registrar llamada saliente" class="img-fluid mb-2" />
            <p>Registrar llamada saliente</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('entrantes.cita') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/registrar-cita.png') }}" alt="Registrar cita médica" class="img-fluid mb-2" />
            <p>Registrar cita médica</p>
        </a>
    </div>
</div>

@endsection
