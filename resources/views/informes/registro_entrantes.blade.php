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
                    <th>Email</th>
                    <th>Email del Usuario</th>
                    <th>Quién Llama</th>
                    <th>Beneficiario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Duración</th>
                    <th>Observaciones</th>
                    <th>Tipo de Llamada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($llamadas as $llamada)
                    <tr>
                        <td>{{ $llamada->email }}</td>
                        <td>{{ $llamada->email_users }}</td>
                        <td>{{ $llamada->quien_llama }}</td>
                        <td>{{ $llamada->beneficiario }}</td>
                        <td>{{ $llamada->fecha }}</td>
                        <td>{{ $llamada->hora }}</td>
                        <td>{{ $llamada->duracion }}</td>
                        <td>{{ $llamada->observaciones }}</td>
                        <td>{{ $llamada->tipo_llamada }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
