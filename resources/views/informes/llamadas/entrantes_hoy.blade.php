@extends('layouts.app')

@section('title', 'Llamadas registradas')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Llamadas registradas</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid">
    <div class="my-3 d-flex justify-content-center gap-2 flex-wrap">
        <a href="{{ route('informes.llamadas.entrantes.hoy') }}" class="btn {{ request()->routeIs('informes.llamadas.entrantes.hoy') ? 'btn-primary' : 'btn-outline-primary' }}">
            Llamadas entrantes hoy
        </a>
        <a href="{{ route('informes.llamadas.entrantes.siempre') }}" class="btn {{ request()->routeIs('informes.llamadas.entrantes.siempre') ? 'btn-primary' : 'btn-outline-primary' }}">
            Llamadas entrantes siempre
        </a>
        <a href="{{ route('informes.llamadas.salientes.hoy') }}" class="btn {{ request()->routeIs('informes.llamadas.salientes.hoy') ? 'btn-primary' : 'btn-outline-primary' }}">
            Llamadas salientes hoy
        </a>
        <a href="{{ route('informes.llamadas.salientes.siempre') }}" class="btn {{ request()->routeIs('informes.llamadas.salientes.siempre') ? 'btn-primary' : 'btn-outline-primary' }}">
            Llamadas salientes siempre
        </a>
    </div>

    <form method="GET" action="{{ route('informes.llamadas.entrantes.hoy') }}" class="mb-4">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 w-100" style="max-width: 800px;">
                <div class="d-flex align-items-center flex-grow-1" style="min-width: 200px;">
                    <label for="desde" class="me-2 mb-0">Desde:</label>
                    <input 
                        type="time" 
                        name="desde"
                        id="desde" 
                        value="{{ request('desde') }}" 
                        class="form-control" 
                        title="Desde"
                    >
                </div>
                <div class="d-flex align-items-center flex-grow-1" style="min-width: 200px;">
                    <label for="hasta" class="me-2 mb-0">Hasta:</label>
                    <input 
                        type="time" 
                        name="hasta"
                        id="hasta" 
                        value="{{ request('hasta') }}" 
                        class="form-control" 
                        title="Hasta"
                    >
                </div>
                <a href="{{ route('informes.llamadas.entrantes.hoy') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle"></i>
                </a>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>
    
    @if($entrantes_hoy->isEmpty())
        <div class="alert alert-danger">
            @if(request()->filled('desde') || request()->filled('hasta'))
                No se encontraron llamadas para los filtros aplicados.
            @else
                No hay llamadas entrantes registradas.
            @endif
        </div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Email del teleoperador</th>
                        <th>DNI del beneficiario</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Tipo de llamada</th>
                        <th>Nivel de activación</th>
                        <th>Observaciones</th>
                        <th>Audios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entrantes_hoy as $llamada)
                        <tr>
                            <td>{{ $llamada->email_users }}</td>
                            <td>{{ $llamada->dni_beneficiario }}</td>
                            <td>{{ \Carbon\Carbon::parse($llamada->hora_inicio)->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($llamada->hora_fin)->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ $llamada->tipo_llamada }}</td>
                            <td>{{ $llamada->nivel_activacion }}</td>
                            <td>{{ $llamada->observaciones }}</td>
                            <td class="text-center">
                                @if($llamada->tiene_audio)
                                    <a href="{{ asset('storage/audios/' . $llamada->archivo) }}" class="btn btn-sm btn-outline-success" download>Descargar</a>
                                @else
                                    <span class="text-muted">No disponible</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
