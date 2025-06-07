@extends('layouts.app')

@section('title', 'Gestión')

@section('content')

<div class="d-flex align-items-center justify-content-between mb-5 p-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center">
        <h2 class="fw-bold mb-0">Gestión</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center">
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.altabeneficiario') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/nuevo-usuario.png') }}" alt="Alta de nuevo beneficiario" class="img-fluid mb-2" />
            <p>Alta de nuevo beneficiario</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.actualizar') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/editar-usuario.png') }}" alt="Modificar beneficiario" class="img-fluid mb-2" />
            <p>Modificar beneficiario</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.borrar.beneficiario.form') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/borrar-usuario.png') }}" alt="Dar de baja beneficiario" class="img-fluid mb-2" />
            <p>Dar de baja a un beneficiario</p>
        </a>
    </div>
</div>

<div class="row g-4 justify-content-center mt-4">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.contactos') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/nuevo-contacto.png') }}" alt="Asignación de personas de contacto" class="img-fluid mb-2" />
            <p>Asignación de personas de contacto</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.contactos.buscar.mod') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/modificar-contacto.png') }}" alt="Modificación de personas de contacto" class="img-fluid mb-2" />
            <p>Modificación de personas de contacto</p>
        </a>
    </div>
</div>

@endsection
