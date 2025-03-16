@extends('layout')

@section('seccion', 'Salientes')
@section('title', 'Error al registrar la llamada')
@section('ruta_volver', route('salientes.create'))
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
        <a href="{{ route('salientes.create') }}" class="btn btn-primary">Volver al formulario</a>
    </div>
@endsection
