@extends('layout')

@section('seccion', 'Notas')
@section('title', 'Evaluación')
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
        <a href="{{ route('evaluar.index') }}" class="btn btn-primary">Volver al menu</a>
    </div>
@endsection
