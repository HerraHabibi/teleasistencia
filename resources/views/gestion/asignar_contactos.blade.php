@extends('layout')

@section('seccion', 'Gestión')
@section('title','Asignar contacto')
@section('ruta_volver', route('gestion.index'))
@section('content')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('gestion.contactos.buscar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="dni">Buscar beneficiario por DNI:</label>
            <input type="text" id="dni" name="dni" placeholder="Introduce el DNI" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Crear contacto</button>
        </div>
    </form>
@endsection
