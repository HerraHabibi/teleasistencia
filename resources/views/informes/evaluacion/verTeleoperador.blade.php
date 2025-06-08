@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Evaluaciones registradas')
@section('ruta_volver', route('informes.index'))

@section('content')

    <form method="GET" action="{{ route('evaluar.verTeleoperador') }}" class="my-4">
        <div class="d-flex justify-content-center">
            <div class="d-flex w-100" style="max-width: 600px;">
                <input 
                    type="text" 
                    name="buscar" 
                    value="{{ request('buscar') }}" 
                    class="form-control me-2" 
                    placeholder="Buscar por email de usuario"
                >
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    @if($evaluaciones->isEmpty())
    <p class="alert alert-danger mt-20px">
        @if(request('buscar'))
            No se encontraron evaluaciones para el email:  <strong>{{ request('buscar') }}</strong>.
        @else
            No hay evaluaciones registradas.
        @endif
    </p>

    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>Nombre del evaluado</th>
                    <th>Email del evaluado</th>
                    <th>Email del evaluador</th>
                    <th>Nombre del evaluador</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha final</th>
                    <th>Media</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluaciones as $evaluacion)
                    <tr>
                        <td>{{ $evaluacion->nombre_teleoperador }}</td>
                        <td>{{ $evaluacion->email_teleoperador }}</td>
                        <td>{{ $evaluacion->email_usuario }}</td>
                        <td>{{ $evaluacion->nombre_usuario }}</td>
                        <td>{{ $evaluacion->hora_inicio }}</td>
                        <td>{{ $evaluacion->hora_fin }}</td>
                        <td>{{ $evaluacion->media }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
