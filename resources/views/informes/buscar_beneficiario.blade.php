@extends('layouts.app')

@section('title','Informe del beneficiario')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Informe del beneficiario</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-4">

    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('informes.informes-beneficiario') }}" class="mx-auto" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="dni" class="form-label">Buscar beneficiario por DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="Introduce el DNI" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-search"></i> Buscar
            </button>
        </div>
    </form>
</div>
@endsection
