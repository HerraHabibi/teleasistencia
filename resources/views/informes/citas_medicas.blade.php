@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Citas Médicas Previstas para Hoy')
@section('ruta_volver', route('informes.previstas'))
@section('content')
    @if($resultados->isEmpty())
        <p class="alert alert-danger">No hay citas médicas previstas para hoy.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>DNI Beneficiario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultados as $cita)
                    <tr>
                        <td>{{ $cita->dni_beneficiario }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->observaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
