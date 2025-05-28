@extends('layout')

@section('seccion', 'Informes')
@section('title','Informes del teleoperador')
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
    <form method="POST" action="{{ route('informes.buscar-teleoperador') }}">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="email">Buscar teleoperador por email:</label>
            <input type="email" id="email" name="email" placeholder="Introduce el email" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
