@extends('layouts.app')
@section('title', 'Listado Beneficiarios')
@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Listado Beneficiarios</h2>
    </div>
    <div style="width: 38px;"></div>
</div>
<div class="container-fluid mt-3">
    <form method="POST" action="{{ route('informes.beneficiarios.buscar') }}" class="mx-auto" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="opcion" class="form-label">Selecciona una opción:</label>
            <select id="opcion" name="opcion" class="form-control" required>
                <option value="dni">Listado de contactos (ordenados por apellidos)</option>
                <option value="sexo">Listado de contactos (ordenados por tipo de contacto)</option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary px-4">Buscar</button>
        </div>
    </form>
</div>
@endsection
