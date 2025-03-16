<!-- resources/views/resultados.blade.php -->

@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Resultados de la búsqueda')
@section('ruta_volver', route('informes.index'))
@section('content')
    <h3 style="text-align: center; margin-bottom:0px;">Si quieres buscar algo en concreto pon Control+F</h3>
    <table class="styled-table">
        <thead>
            <tr>
                <td><b>DNI del Beneficiario</b></td>
                <td><b>Nombre</b></td>
                <td><b>Apellidos</b></td>
                <td><b>Teléfono</b></td>
                <td><b>Tipo</b></td>
                <td><b>Dirección</b></td>
                <td><b>Código Postal</b></td>
                <td><b>Localidad</b></td>
                <td><b>Provincia</b></td>
                <td><b>Email</b></td>
            </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contacto)
            <tr>
                <td>{{ $contacto->dni_beneficiario }}</td>
                <td>{{ $contacto->nombre }}</td>
                <td>{{ $contacto->apellidos }}</td>
                <td>{{ $contacto->telefono }}</td>
                <td>{{ $contacto->tipo }}</td>
                <td>{{ $contacto->direccion }}</td>
                <td>{{ $contacto->codigopostal }}</td>
                <td>{{ $contacto->localidad }}</td>
                <td>{{ $contacto->provincia }}</td>
                <td>{{ $contacto->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
