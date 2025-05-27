@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Informe del beneficiario')
@section('ruta_volver', route('informes.index'))
@section('content')
<h2 class='text-center'>Resumen del beneficiario</h2>
<table class="styled-table" align="center">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre completo</th>
            <th>Llamadas realizadas</th>
            <th>Llamadas recibidas</th>
            <th>Llamadas no contestadas</th>
            <th>Nvl. activación 1</th>
            <th>Nvl. activación 2</th>
            <th>Nvl. activación 3</th>
            <th>Eval. media</th>
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

<h2 class="text-center">Llamadas del beneficiario</h2>
<table class="styled-table" align="center">
    <thead>
        <tr>
            <th>Quién llamó</th>
            <th>Teleoperador</th>
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
                        <a href="{{ asset('storage/audios/' . $llamada->archivo) }}" class="btn-download" download>Descargar</a>
                    @else
                        <span class="text-gray-500">No disponible</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
