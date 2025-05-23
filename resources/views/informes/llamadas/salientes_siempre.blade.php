@extends('layout')

@section('seccion', 'Informes')
@section('title', 'Llamadas registradas')
@section('ruta_volver', route('informes.index'))
@section('content')
    <nav class="flex justify-center m-auto gap-30px mt-20px">
        <a href="{{ route('informes.llamadas.entrantes.hoy') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas entrantes hoy
        </a>
        <a href="{{ route('informes.llamadas.entrantes.siempre') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas entrantes siempre
        </a>
        <a href="{{ route('informes.llamadas.salientes.hoy') }}" class="cursor-pointer p-20px rounded-md not-selected-tab">
            Llamadas salientes hoy
        </a>
        <a href="{{ route('informes.llamadas.salientes.siempre') }}" class="cursor-pointer p-20px rounded-md selected-tab">
            Llamadas salientes siempre
        </a>
    </nav>
    @if($salientes_siempre->isEmpty())
        <p class="alert alert-danger mt-20px">No hay llamadas salientes registradas.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>Email del teleoperador</th>
                    <th>DNI del beneficiario</th>
                    <th>Email del beneficiario/contacto</th>
                    <th>Responde</th>
                    <th>Intentos</th>
                    <th>Quién Coge</th>
                    <th>Beneficiario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Duración</th>
                    <th>Tipo de Llamada</th>
                    <th>Observaciones</th>
                    <th>Audios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salientes_siempre as $llamada)
                    <tr>
                        <td>{{ $llamada->email_users }}</td>
                        <td>{{ $llamada->dni_beneficiario }}</td>
                        <td>{{ $llamada->email }}</td>
                        <td>{{ $llamada->responde }}</td>
                        <td>{{ $llamada->intentos }}</td>
                        <td>{{ $llamada->quien_coge }}</td>
                        <td>{{ $llamada->beneficiario }}</td>
                        <td>{{ $llamada->fecha }}</td>
                        <td>{{ $llamada->hora }}</td>
                        <td>{{ $llamada->duracion }}</td>
                        <td>{{ $llamada->tipo }}</td>
                        <td>{{ $llamada->observaciones }}</td>
                        <td class="text-center">
                            @if($llamada->tiene_audio)
                                <a href="{{ asset('storage/audios/' . $llamada->archivo) }}" class="btn-download" download>Descargar</a>
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
