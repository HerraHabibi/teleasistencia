@extends('layouts.app')

@section('title', 'Informe del teleoperador')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.informes-teleoperador') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Informe del teleoperador</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">

    <div class="table-responsive shadow rounded bg-white p-3 mb-4">
        <h4 class="fw-bold text-center mb-3">Resumen del teleoperador</h4>
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-primary titulo-tabla">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Llamadas realizadas</th>
                    <th>Llamadas atendidas</th>
                    <th>Llamadas no contestadas</th>
                    <th>Eval. media</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $teleoperador->name }}</td>
                    <td>{{ $teleoperador->email }}</td>
                    <td>{{ $totalRealizadas }}</td>
                    <td>{{ $totalAtendidas }}</td>
                    <td>{{ $totalRealizadasNoContestadas }}</td>
                    <td>
                        @if($evaluacionMedia !== null)
                            {{ number_format($evaluacionMedia, 2) }}/10
                        @else
                            <span class="text-muted">Sin datos</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive shadow rounded bg-white p-3 mb-4">
        <h4 class="fw-bold text-center mb-3">Llamadas del teleoperador</h4>
        @if($llamadas->isEmpty())
            <div class="alert alert-danger text-center">El teleoperador no ha realizado ni atendido llamadas.</div>
        @else
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Quién llamó</th>
                        <th>Beneficiario</th>
                        <th>Fecha y hora</th>
                        <th>Tipo de llamada</th>
                        <th>Nivel de activación</th>
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
                            <td>{{ $llamada->beneficiario_nombre ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($llamada->fecha_hora)->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ $llamada->tipo ?? '-' }}</td>
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

    <div class="table-responsive shadow rounded bg-white p-3">
        <h4 class="fw-bold text-center mb-3">Evaluaciones del teleoperador</h4>
        @if($evaluaciones->isEmpty())
            <div class="alert alert-danger text-center">Este teleoperador no ha sido evaluado.</div>
        @else
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Evaluador</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Bienvenida</th>
                        <th>Contenido</th>
                        <th>Comunicación</th>
                        <th>Despedida</th>
                        <th>Media</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluaciones as $eval)
                        <tr>
                            <td>{{ $eval['nombre_usuario'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($eval['hora_inicio'])->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($eval['hora_fin'])->format('H:i:s - d/m/Y') }}</td>
                            <td>{{ $eval['bienvenida'] }}</td>
                            <td>{{ $eval['contenido'] }}</td>
                            <td>{{ $eval['comunicacion'] }}</td>
                            <td>{{ $eval['despedida'] }}</td>
                            <td>{{ $eval['media'] }}</td>
                            <td>{{ $eval['observaciones'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
