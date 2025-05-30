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
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Fecha de nacimiento</th>
                <th>Número Seg. Social</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>Tipo de beneficiario</th>
                <th>Dirección</th>
                <th>Código Postal</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Email</th>
                <th>Situacion sanitaria</th>
                <th>Situacion familiar</th>
                <th>Situacion de la vivienda</th>
                <th>Situacion económica</th>
                <th>Otros recursos</th>
                <th>Instalación de terminal</th>
                <th>Otros complementos TAS</th>
                <th>Dispone de teleasistencia móvil</th>
                <th>Sistema de telelocalización</th>
                <th>Custodia de llaves</th>
                <th>Autonomía personal</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beneficiarios as $beneficiario)
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
                <td>{{ $beneficiario->situacion_sanitaria }}</td>
                <td>{{ $beneficiario->situacion_familiar }}</td>
                <td>{{ $beneficiario->situacion_de_la_vivienda }}</td>
                <td>{{ $beneficiario->situacion_economica }}</td>
                <td>{{ $beneficiario->otros_recursos }}</td>
                <td>{{ $beneficiario->instalacion_de_terminal }}</td>
                <td>{{ $beneficiario->otros_complementos_TAS }}</td>
                <td>{{ $beneficiario->dispone_de_teleasistencia_movil }}</td>
                <td>{{ $beneficiario->sistema_de_telelocalizacion }}</td>
                <td>{{ $beneficiario->custodia_de_llaves }}</td>
                <td>{{ $beneficiario->autonomia_personal }}</td>
                <td>{{ $beneficiario->observaciones }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
