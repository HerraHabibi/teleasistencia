{{-- resources/views/informes/llamadas_salientes.blade.php --}}

@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Llamadas Salientes de Hoy')
@section('ruta_volver', route('informes.index'))
@section('content')
    @if($llamadas->isEmpty())
        <p class="alert alert-danger">No hay llamadas salientes registradas para hoy.</p>
    @else
        <table class="tabla-bonita" align="center">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Email del Usuario</th>
                    <th>Responde</th>
                    <th>Intentos</th>
                    <th>Quién Coge</th>
                    <th>Beneficiario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Duración</th>
                    <th>Observaciones</th>
                    <th>DNI del Beneficiario</th>
                    <th>Tipo de Llamada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($llamadas as $llamada)
                    <tr>
                        <td>{{ $llamada->email }}</td>
                        <td>{{ $llamada->email_users }}</td>
                        <td>{{ $llamada->responde }}</td>
                        <td>{{ $llamada->intentos }}</td>
                        <td>{{ $llamada->quien_coge }}</td>
                        <td>{{ $llamada->beneficiario }}</td>
                        <td>{{ $llamada->fecha }}</td>
                        <td>{{ $llamada->hora }}</td>
                        <td>{{ $llamada->duracion }}</td>
                        <td>{{ $llamada->observaciones }}</td>
                        <td>{{ $llamada->dni_beneficiario }}</td>
                        <td>{{ $llamada->tipo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
