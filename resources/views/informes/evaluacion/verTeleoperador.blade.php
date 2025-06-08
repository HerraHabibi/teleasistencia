@extends('layouts.app')

@section('title', 'Evaluaciones registradas')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('evaluar.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Evaluaciones registradas</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">

    <form method="GET" action="{{ route('evaluar.verTeleoperador') }}" class="mb-4">
        <div class="d-flex justify-content-center">
            <div class="d-flex w-100" style="max-width: 600px;">
                <input 
                    type="text" 
                    name="buscar" 
                    value="{{ request('buscar') }}" 
                    class="form-control me-2" 
                    placeholder="Buscar por email de usuario"
                >
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    @if($evaluaciones->isEmpty())
        <div class="alert alert-danger">
            @if(request('buscar'))
                No se encontraron evaluaciones para el email: <strong>{{ request('buscar') }}</strong>.
            @else
                No hay evaluaciones registradas.
            @endif
        </div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Nombre del evaluado</th>
                        <th>Email del evaluado</th>
                        <th>Email del evaluador</th>
                        <th>Nombre del evaluador</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha final</th>
                        <th>Media</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluaciones as $evaluacion)
                        <tr>
                            <td>{{ $evaluacion->nombre_teleoperador }}</td>
                            <td>{{ $evaluacion->email_teleoperador }}</td>
                            <td>{{ $evaluacion->email_usuario }}</td>
                            <td>{{ $evaluacion->nombre_usuario }}</td>
                            <td>{{ $evaluacion->hora_inicio }}</td>
                            <td>{{ $evaluacion->hora_fin }}</td>
                            <td>{{ $evaluacion->media }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
