@extends('layout')

@section('seccion', 'Informes')
@section('title','Informes del beneficiario')
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
    <form method="POST" action="{{ route('informes.informes-beneficiario') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="dni">Buscar beneficiario por DNI:</label>
            <input type="text" id="dni" name="dni" placeholder="Introduce el DNI" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
