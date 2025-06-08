@extends('layouts.app')

@section('title', 'Citas médicas previstas para hoy')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.previstas') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Citas médicas previstas para hoy</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if($resultados->isEmpty())
        <div class="alert alert-danger">
            No hay citas médicas previstas para hoy.
        </div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>DNI Beneficiario</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $cita)
                        <tr>
                            <td>{{ $cita->dni_beneficiario }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->observaciones }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
