@extends('layout')

@section('seccion', 'Gestión')
@section('title','Consultar datos de interes')
@section('ruta_volver', route('informes.index'))
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
    <form method="POST" action="{{ route('informes.consultar.buscar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="dni">Buscar beneficiario por DNI:</label>
            <input type="text" id="dni" name="dni" placeholder="Introduce el DNI" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Consultar</button>
        </div>
    </form>
@endsection
