{{-- resources/views/audios/index.blade.php --}}

@extends('layout')

@section('seccion', 'Audios')
@section('title', 'Lista de Audios')
@section('ruta_volver', route('home'))
@section('content')
    @if($llamadas->isEmpty())
        <p>No hay registros de llamadas con archivos.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Fecha creada</th>
                    <th>Nombre del archivo</th>
                    <th style="text-align: center">Descargar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($llamadas as $llamada)
                    <tr>
                        <td>{{ $llamada->nombre }}</td>
                        <td>{{ $llamada->email }}</td>
                        <td>{{ $llamada->tipo_llamada }}</td>
                        <td>{{ $llamada->created_at }}</td>
                        <td>{{ $llamada->archivo }}</td>
                        <td style="text-align: center">
                            <a href="{{ asset('storage/audios/' . $llamada->archivo) }}" class="btn-download" download>Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
