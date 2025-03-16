@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Error al crear beneficiario')
@section('ruta_volver', route('gestion.index'))
@section('content')
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
    <div>
        <a href="{{ route('gestion.altabeneficiario') }}" class="btn btn-primary">Volver al formulario</a>
    </div>
@endsection
