@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Evaluaciones registradas')
@section('ruta_volver', route('informes.index'))

@section('content')
    <nav class="flex justify-center m-auto gap-30px mt-20px ">
        <a href="{{ route('evaluar.verUsuario') }}" class="cursor-pointer p-20px rounded-md selected-tab" {{ request()->routeIs('evaluaciones.usuario') ? 'selected-tab' : 'not-selected-tab' }}">
            Evaluaciones por Usuario
        </a>
        <a href="{{ route('evaluar.verTeleoperador') }}" class="cursor-pointer p-20px rounded-md not-selected-tab" {{ request()->routeIs('evaluaciones.teleoperador') ? 'selected-tab' : 'not-selected-tab' }}">
            Evaluaciones por Teleoperador
        </a>
    </nav>
    <form method="GET" action="{{ route('evaluar.verUsuario') }}" class="my-4">
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
    <!-- tu tabla -->

    @if($evaluaciones->isEmpty())
        <p class="alert alert-danger mt-20px">No hay evaluaciones registradas.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Email del usuario</th>
                    <th>Email del teleoperador</th>
                    <th>Media</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluaciones as $evaluacion)
                    <tr>
                        <td>{{ $evaluacion->hora_inicio }}</td>
                        <td>{{ $evaluacion->hora_fin }}</td>
                        <td>{{ $evaluacion->email_usuario }}</td>
                        <td>{{ $evaluacion->email_teleoperador }}</td>
                        <td>{{ $evaluacion->media }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @endif
@endif
@endsection


