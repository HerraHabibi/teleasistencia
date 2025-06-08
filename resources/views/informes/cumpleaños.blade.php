@extends('layouts.app')

@section('title', 'Cumpleañeros de hoy')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.previstas') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Beneficiarios que cumplen años hoy</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-4">
    @if($resultados->isEmpty())
        <p class="alert alert-danger text-center">No hay beneficiarios que cumplan años hoy.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Nº Seguridad Social</th>
                        <th>Sexo</th>
                        <th>Estado Civil</th>
                        <th>Tipo</th>
                        <th>Dirección</th>
                        <th>C.P.</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $b)
                        <tr>
                            <td>{{ $b->nombre }}</td>
                            <td>{{ $b->apellidos }}</td>
                            <td>{{ $b->dni }}</td>
                            <td>{{ $b->telefono }}</td>
                            <td>{{ $b->fecha_nacimiento }}</td>
                            <td>{{ $b->num_seguridad_social }}</td>
                            <td>{{ $b->sexo }}</td>
                            <td>{{ $b->estado_civil }}</td>
                            <td>{{ $b->tipo_beneficiario }}</td>
                            <td>{{ $b->direccion }}</td>
                            <td>{{ $b->codigo_postal }}</td>
                            <td>{{ $b->localidad }}</td>
                            <td>{{ $b->provincia }}</td>
                            <td>{{ $b->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
