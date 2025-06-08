@extends('layouts.app')

@section('title', 'Evaluación')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('entrantes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Evaluación</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('evaluar.index') }}" class="btn btn-primary">
            Volver al menú
        </a>
    </div>
</div>
@endsection
