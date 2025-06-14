@extends('layouts.app')

@section('title', 'Asignación de personas de contacto')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('gestion.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Asignación de personas de contacto</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    <form method="POST" action="{{ route('gestion.contactos.buscar') }}" class="mx-auto" style="max-width: 400px;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="dni" class="form-label">Buscar beneficiario por DNI:</label>
            <input type="text" id="dni" name="dni" class="form-control" placeholder="Introduce el DNI" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary px-4">Crear contacto</button>
        </div>
    </form>
</div>
@endsection
