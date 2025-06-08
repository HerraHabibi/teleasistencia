@extends('layouts.app')

@section('title', 'Datos de los beneficiarios')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Datos de los beneficiarios</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid">
    <div class="table-responsive shadow rounded bg-white p-3">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-primary titulo-tabla">
                <tr>
                    <th>DNI</th>
                    <th>Nombre completo</th>
                    <th>Teléfono</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nº Seg. Social</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Tipo beneficiario</th>
                    <th>Dirección</th>
                    <th>Código Postal</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Email</th>
                    <th>Situación sanitaria</th>
                    <th>Situación familiar</th>
                    <th>Situación vivienda</th>
                    <th>Situación económica</th>
                    <th>Otros recursos</th>
                    <th>Instalación terminal</th>
                    <th>Otros compl. TAS</th>
                    <th>Teleasistencia móvil</th>
                    <th>Telelocalización</th>
                    <th>Custodia llaves</th>
                    <th>Autonomía personal</th>
                    <th>Enfermedades</th>
                    <th>Alergias</th>
                    <th>Medicación mañana</th>
                    <th>Medicación tarde</th>
                    <th>Medicación noche</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->dni }}</td>
                        <td>{{ $beneficiario->nombre . ' ' . $beneficiario->apellidos }}</td>
                        <td>{{ $beneficiario->telefono }}</td>
                        <td>{{ \Carbon\Carbon::parse($beneficiario->fecha_nacimiento)->format('d/m/Y') }}</td>
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
                        <td>{{ optional($beneficiario->beneficiarioInteres)->enfermedades ?? 'Ninguna' }}</td>
                        <td>{{ optional($beneficiario->beneficiarioInteres)->alergias ?? 'Ninguna' }}</td>
                        <td>{{ optional($beneficiario->beneficiarioInteres)->medicacion_manana ?? 'Ninguna' }}</td>
                        <td>{{ optional($beneficiario->beneficiarioInteres)->medicacion_tarde ?? 'Ninguna' }}</td>
                        <td>{{ optional($beneficiario->beneficiarioInteres)->medicacion_noche ?? 'Ninguna' }}</td>
                        <td>{{ $beneficiario->observaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
