@extends('layouts.app')

@section('title', 'Gestión de usuarios')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Gestión de usuarios</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="row g-4 justify-content-center">
    
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.altabeneficiario') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/nuevo-usuario.png') }}" alt="Alta de beneficiario" class="img-fluid mb-2" />
            <p>Alta de beneficiario</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.actualizar') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/editar-usuario.png') }}" alt="Modificación de beneficiario" class="img-fluid mb-2" />
            <p>Modificación de beneficiario</p>
        </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <a href="{{ route('gestion.borrar.beneficiario.form') }}" class="text-center text-decoration-none d-block h-100 card-link">
            <img src="{{ asset('images/borrar-usuario.png') }}" alt="Baja de beneficiario" class="img-fluid mb-2" />
            <p>Baja de beneficiario</p>
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
