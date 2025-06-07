@extends('layouts.app')

@section('title', 'Llamadas')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-5">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center">
        <h2 class="fw-bold mb-0">Llamadas</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('entrantes.create') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamada-entrante.png') }}" alt="Llamada entrante" class="img-fluid mb-2" />
            <p>Llamada entrante</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('salientes.create') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamada-saliente.png') }}" alt="Llamadas salientes" class="img-fluid mb-2" />
            <p>Llamadas salientes</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
        <a href="{{ route('entrantes.cita') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/registrar-cita.png') }}" alt="Registrar citas" class="img-fluid mb-2" />
            <p>Registrar citas</p>
        </a>
    </div>
</div>

@endsection
