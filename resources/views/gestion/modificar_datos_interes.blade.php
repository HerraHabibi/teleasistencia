@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Modificar datos de interés')
@section('ruta_volver', route('gestion.index'))
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="beneficiary-form" method="post" action="{{ route('gestion.interes.modificar') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-grid">
        <div class="form-group">
            <label for="dni_beneficiario">DNI del beneficiario</label>
            <input type="text" id="dni_beneficiario" name="dni_beneficiario" value="{{ $beneficiarioInteres->dni_beneficiario }}" placeholder="DNI del beneficiario" required readonly/>
        </div>
        <div class="form-group">
            <label for="enfermedades">Enfermedades (opcional)</label>
            <input type="text" id="enfermedades" name="enfermedades" value="{{ $beneficiarioInteres->enfermedades }}" placeholder="Enfermedades" />
        </div>
        <div class="form-group">
            <label for="alergias">Alergias (opcional)</label>
            <input type="text" id="alergias" name="alergias" value="{{ $beneficiarioInteres->alergias }}" placeholder="Alergias" />
        </div>
        <div class="form-group">
            <label for="medicacion_manana">Medicación Mañana (opcional)</label>
            <input type="text" id="medicacion_manana" name="medicacion_manana" value="{{ $beneficiarioInteres->medicacion_manana }}" placeholder="Medicación Mañana" />
        </div>
        <div class="form-group">
            <label for="medicacion_tarde">Medicación Tarde (opcional)</label>
            <input type="text" id="medicacion_tarde" name="medicacion_tarde" value="{{ $beneficiarioInteres->medicacion_tarde }}" placeholder="Medicación Tarde" />
        </div>
        <div class="form-group">
            <label for="medicacion_noche">Medicación Noche (opcional)</label>
            <input type="text" id="medicacion_noche" name="medicacion_noche" value="{{ $beneficiarioInteres->medicacion_noche }}" placeholder="Medicación Noche" />
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <input type="text" id="observaciones" name="observaciones" value="{{ $beneficiarioInteres->observaciones }}" />
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn-submit">Asignar datos de interés</button>
    </div>
</form>
@endsection
