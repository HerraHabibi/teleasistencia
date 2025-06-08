@extends('layouts.app')

@section('title', 'Llamadas previstas')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Llamadas previstas</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-4">

    <form method="POST" action="{{ route('informes.previstas.buscar') }}" enctype="multipart/form-data" class="w-100" style="max-width: 600px; margin: auto;">
        @csrf

        <div class="mb-4">
            <label for="opcion" class="form-label">Selecciona una opción:</label>
            <select id="opcion" name="opcion" class="form-select" required>
                <option value="citas_medicas_hoy">Consultar las citas médicas previstas para hoy</option>
                <option value="cumpleaneros_hoy">Consultar los beneficiarios que cumplen años hoy</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>

    </form>
</div>
@endsection
