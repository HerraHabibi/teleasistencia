@extends('layouts.app')

@section('title', 'Informes')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Informes</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center mb-4">
    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.beneficiarios.buscar') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/re.png') }}" alt="Datos de los beneficiarios" class="img-fluid mb-2" />
            <p>Datos de los beneficiarios</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.contactos.buscar') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/contactos.png') }}" alt="Datos de los contactos" class="img-fluid mb-2" />
            <p>Datos de los contactos</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('evaluar.index') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/1.png') }}" alt="Evaluaciones" class="img-fluid mb-2" />
            <p>Evaluaciones</p>
        </a>
    </div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.llamadas.entrantes.hoy') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamadas-registradas.png') }}" alt="Llamadas registradas" class="img-fluid mb-2" />
            <p>Llamadas registradas</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.previstas') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/llamadas-previstas.png') }}" alt="Llamadas previstas" class="img-fluid mb-2" />
            <p>Llamadas previstas</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.informes-beneficiario') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/informes-beneficiarios.png') }}" alt="Informes de los beneficiarios" class="img-fluid mb-2" />
            <p>Informes de los beneficiarios</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3 text-center">
        <a href="{{ route('informes.informes-teleoperador') }}" class="text-decoration-none d-block card-link h-100">
            <img src="{{ asset('images/informes-teleoperadores.png') }}" alt="Informes de los teleoperadores" class="img-fluid mb-2" />
            <p>Informes de los teleoperadores</p>
        </a>
    </div>
</div>

@endsection
