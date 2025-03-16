@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Beneficiarios que Cumplen Años Hoy')
@section('ruta_volver', route('informes.previstas'))
@section('content')
    @if($resultados->isEmpty())
        <p class="alert alert-danger">No hay beneficiarios que cumplan años hoy.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Número de Seguridad Social</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Tipo de Beneficiario</th>
                    <th>Dirección</th>
                    <th>Código Postal</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultados as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->nombre }}</td>
                        <td>{{ $beneficiario->apellidos }}</td>
                        <td>{{ $beneficiario->dni }}</td>
                        <td>{{ $beneficiario->telefono }}</td>
                        <td>{{ $beneficiario->fecha_nacimiento }}</td>
                        <td>{{ $beneficiario->num_seguridad_social }}</td>
                        <td>{{ $beneficiario->sexo }}</td>
                        <td>{{ $beneficiario->estado_civil }}</td>
                        <td>{{ $beneficiario->tipo_beneficiario }}</td>
                        <td>{{ $beneficiario->direccion }}</td>
                        <td>{{ $beneficiario->codigo_postal }}</td>
                        <td>{{ $beneficiario->localidad }}</td>
                        <td>{{ $beneficiario->provincia }}</td>
                        <td>{{ $beneficiario->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
