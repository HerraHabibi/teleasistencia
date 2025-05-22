@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Llamadas')
@section('ruta_volver', route('informes.index'))
@section('content')
    <nav class="flex justify-center m-auto gap-30px mt-20px">
        <a href="{{ route('informes.llamadas.entrantes.hoy') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas entrantes hoy
        </a>
        <a href="{{ route('informes.llamadas.entrantes.siempre') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas entrantes siempre
        </a>
        <a href="{{ route('informes.llamadas.salientes.hoy') }}" class="cursor-pointer p-20px rounded-md selected-tab">
            Llamadas salientes hoy
        </a>
        <a href="{{ route('informes.llamadas.salientes.siempre') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas salientes siempre
        </a>
    </nav>
    @if($salientes_hoy->isEmpty())
        <p class="alert alert-danger mt-20px">No hay llamadas salientes registradas para hoy.</p>
    @else
        <table class="styled-table" align="center">
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
                    <th>DNI del Beneficiario</th>
                    <th>Tipo de Llamada</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salientes_hoy as $llamada)
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
                        <td>{{ $llamada->dni_beneficiario }}</td>
                        <td>{{ $llamada->tipo }}</td>
                        <td>{{ $llamada->observaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
