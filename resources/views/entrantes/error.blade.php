@extends('layout')

@section('seccion', 'Entrantes')
@section('title', 'Resultado al registrar de llamada entrante')
@section('ruta_volver', route('entrantes.index'))
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
    <div>
        <a href="{{ route('entrantes.index') }}" class="btn btn-primary">Volver al formulario</a>
    </div>
@endsection
