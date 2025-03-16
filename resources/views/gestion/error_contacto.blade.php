@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Error al crear contacto')
@section('ruta_volver', route('gestion.index'))
@section('content')
    <div class="alert alert-danger">
        <p>{{ session('error') }}</p>
    </div>
    <div>
        <a href="{{ route('gestion.contactos') }}" class="btn btn-primary">Volver al formulario</a>
    </div>
@endsection
