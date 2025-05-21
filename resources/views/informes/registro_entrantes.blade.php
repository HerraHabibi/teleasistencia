{{-- resources/views/informes/llamadas_entrantes.blade.php --}}

@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Llamadas Entrantes de Hoy')
@section('ruta_volver', route('informes.index'))
@section('content')
    @if($llamadas->isEmpty())
        <p class="alert alert-danger">No hay llamadas entrantes registradas para hoy.</p>
    @else
        <table class="tabla-bonita" align="center">
            <thead>
                <tr>
                    <th>Email del Usuario</th>
                    <th>DNI del beneficiario</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Observaciones</th>
                    <th>Tipo de llamada</th>
                    <th>Nivel de activación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($llamadas as $llamada)
                    <tr>
                        <td>{{ $llamada->email_users }}</td>
                        <td>{{ $llamada->dni_beneficiario }}</td>
                        <td>{{ $llamada->hora_inicio }}</td>
                        <td>{{ $llamada->hora_fin }}</td>
                        <td>{{ $llamada->observaciones }}</td>
                        <td>{{ $llamada->tipo_llamada }}</td>
                        <td>{{ $llamada->nivel_activacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
