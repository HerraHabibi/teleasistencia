@extends('layout')

@section('seccion', 'Gestión')
@section('title','Modificar personas de contacto')
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
    <form method="POST" action="{{ route('gestion.contactos.buscar.mod.email') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="email">Buscar contacto por Email:</label>
            <input type="text" id="email" name="email" placeholder="Introduce el email" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
