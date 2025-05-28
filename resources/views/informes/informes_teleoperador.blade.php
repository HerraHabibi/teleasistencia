@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Informe del teleoperador')
@section('ruta_volver', route('informes.index'))

@section('content')
    <h2 class="text-center">Resumen del teleoperador</h2>
    <table class="styled-table" align="center">
        <thead>
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
                        <span class="text-gray-500">Sin datos</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <h2 class="text-center">Llamadas del teleoperador</h2>
    @if($llamadas->isEmpty())
        <p class="alert alert-danger mt-20px">El teleoperador no ha realizado/atendido ninguna llamada.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
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
                                <a href="{{ asset('storage/audios/' . $llamada->archivo) }}" class="btn-download" download>Descargar</a>
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
