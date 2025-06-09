@extends('layouts.app')

@section('title', 'Lista de audios')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Lista de audios</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    <form method="GET" action="{{ route('audios.index') }}" class="mb-4">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 w-100" style="max-width: 800px;">
                <div class="d-flex align-items-center flex-grow-1" style="min-width: 200px;">
                    <label for="desde" class="me-2 mb-0">Desde:</label>
                    <input 
                        type="date" 
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
                        type="date" 
                        name="hasta"
                        id="hasta" 
                        value="{{ request('hasta') }}" 
                        class="form-control" 
                        title="Hasta"
                    >
                </div>
                <a href="{{ route('audios.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle"></i>
                </a>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    @if($llamadas->isEmpty())
        <div class="alert alert-danger">
            @if(request('desde') || request('hasta'))
                No se encontraron llamadas para los filtros aplicados.
            @else
                No hay registros de llamadas con archivos.
            @endif
        </div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Fecha creada</th>
                        <th>Nombre del archivo</th>
                        <th class="text-center">Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($llamadas as $llamada)
                        <tr>
                            <td>{{ $llamada->nombre }}</td>
                            <td>{{ $llamada->email }}</td>
                            <td>{{ $llamada->tipo_llamada }}</td>
                            <td>{{ \Carbon\Carbon::parse($llamada->created_at)->format('d/m/Y H:i') }}</td>
                            <td>{{ $llamada->archivo }}</td>
                            <td class="text-center">
                                @if($llamada->archivo_existe)
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
