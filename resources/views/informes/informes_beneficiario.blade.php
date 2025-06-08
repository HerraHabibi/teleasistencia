@extends('layouts.app')

@section('title', 'Informe del beneficiario')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.informes-beneficiario') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Informe del beneficiario</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">

    <div class="table-responsive shadow rounded bg-white p-3 mb-4">
        <h4 class="fw-bold text-center mb-3">Resumen del beneficiario</h4>
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-primary titulo-tabla">
                <tr>
                    <th>DNI</th>
                    <th>Nombre completo</th>
                    <th>Llamadas recibidas</th>
                    <th>Llamadas realizadas</th>
                    <th>No contestadas</th>
                    <th>Activación 1</th>
                    <th>Activación 2</th>
                    <th>Activación 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $beneficiario->dni }}</td>
                    <td>{{ $beneficiario->nombre }} {{ $beneficiario->apellidos }}</td>
                    <td>{{ $totalEntrantes }}</td>
                    <td>{{ $totalSalientes }}</td>
                    <td>{{ $totalSalientesNoContestadas }}</td>
                    <td>{{ $activacionN1 }}</td>
                    <td>{{ $activacionN2 }}</td>
                    <td>{{ $activacionN3 }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive shadow rounded bg-white p-3">
        <h4 class="fw-bold text-center mb-3">Llamadas del beneficiario</h4>
        @if($llamadas->isEmpty())
            <div class="alert alert-danger text-center">El beneficiario no ha realizado ni recibido llamadas.</div>
        @else
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Quién llamó</th>
                        <th>Teleoperador</th>
                        <th>Fecha y hora</th>
                        <th>Tipo</th>
                        <th>Nivel activación</th>
                        <th>Responde</th>
                        <th>Intentos</th>
                        <th>Quién ha cogido</th>
                        <th>Observaciones</th>
                        <th>Audios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($llamadas as $llamada)
                        <tr>
                            <td>{{ ucfirst($llamada->origen) }}</td>
                            <td>{{ $llamada->teleoperador ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($llamada->fecha_hora)->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ $llamada->tipo_llamada ?? $llamada->tipo ?? '-' }}</td>
                            <td>{{ $llamada->nivel_activacion ?? '-' }}</td>
                            <td>{{ $llamada->responde ?? '-' }}</td>
                            <td>{{ $llamada->intentos ?? '-' }}</td>
                            <td>{{ $llamada->quien_coge ?? '-' }}</td>
                            <td>{{ $llamada->observaciones ?? '-' }}</td>
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
        @endif
    </div>
</div>
@endsection