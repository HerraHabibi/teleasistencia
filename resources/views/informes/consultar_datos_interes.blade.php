@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Asignar datos de interés')
@section('ruta_volver', route('informes.consultar'))
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
<form class="beneficiary-form" method="post" enctype="multipart/form-data">
    @csrf
    <h3 style="text-align: center; margin-bottom:0px;">{{ $beneficiario->nombre }} {{ $beneficiario->apellidos }}</h3>
    <div class="form-grid">
        <div class="form-group">
            <label for="dni_beneficiario">DNI del beneficiario</label>
            <input type="text" id="dni_beneficiario" name="dni_beneficiario" value="{{ $beneficiarioInteres->dni_beneficiario }}" placeholder="DNI del beneficiario" required readonly/>
        </div>
        <div class="form-group">
            <label for="enfermedades">Enfermedades (opcional)</label>
            <input type="text" id="enfermedades" name="enfermedades" value="{{ $beneficiarioInteres->enfermedades }}" placeholder="Enfermedades" readonly/>
        </div>
        <div class="form-group">
            <label for="alergias">Alergias (opcional)</label>
            <input type="text" id="alergias" name="alergias" value="{{ $beneficiarioInteres->alergias }}" placeholder="Alergias" readonly/>
        </div>
        <div class="form-group">
            <label for="medicacion_manana">Medicación Mañana (opcional)</label>
            <input type="text" id="medicacion_manana" name="medicacion_manana" value="{{ $beneficiarioInteres->medicacion_manana }}" placeholder="Medicación Mañana" readonly/>
        </div>
        <div class="form-group">
            <label for="medicacion_tarde">Medicación Tarde (opcional)</label>
            <input type="text" id="medicacion_tarde" name="medicacion_tarde" value="{{ $beneficiarioInteres->medicacion_tarde }}" placeholder="Medicación Tarde" readonly/>
        </div>
        <div class="form-group">
            <label for="medicacion_noche">Medicación Noche (opcional)</label>
            <input type="text" id="medicacion_noche" name="medicacion_noche" value="{{ $beneficiarioInteres->medicacion_noche }}" placeholder="Medicación Noche" readonly/>
        </div>
        <div class="form-group">
            <label for="hora_preferente_manana">Hora Preferente Mañana</label>
            <input type="time" id="hora_preferente_manana" name="hora_preferente_manana" value="{{ $beneficiarioInteres->hora_preferente_manana }}" required readonly/>
        </div>
        <div class="form-group">
            <label for="hora_preferente_tarde">Hora Preferente Tarde</label>
            <input type="time" id="hora_preferente_tarde" name="hora_preferente_tarde" value="{{ $beneficiarioInteres->hora_preferente_tarde }}" required readonly/>
        </div>
        <div class="form-group">
            <label for="hora_preferente_noche">Hora Preferente Noche</label>
            <input type="time" id="hora_preferente_noche" name="hora_preferente_noche" value="{{ $beneficiarioInteres->hora_preferente_noche }}" required readonly/>
        </div>
        <div class="form-group">
            <label for="ambulatorio">¿Servicio de Ambulatorio?</label>
            <select id="ambulatorio" name="ambulatorio" required disabled>
                <option value="Si" {{ $beneficiarioInteres->ambulatorio == 'Si' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $beneficiarioInteres->ambulatorio == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ambulancia">¿Servicio de Ambulancia?</label>
            <select id="ambulancia" name="ambulancia" required disabled>
                <option value="Si" {{ $beneficiarioInteres->ambulancia == 'Si' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $beneficiarioInteres->ambulancia == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="policia">¿Llamar a la Policía?</label>
            <select id="policia" name="policia" required disabled>
                <option value="Si" {{ $beneficiarioInteres->policia == 'Si' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $beneficiarioInteres->policia == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bomberos">¿Llamar a los Bomberos?</label>
            <select id="bomberos" name="bomberos" required disabled>
                <option value="Si" {{ $beneficiarioInteres->bomberos == 'Si' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $beneficiarioInteres->bomberos == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="urgencias">¿Llamar a Urgencias?</label>
            <select id="urgencias" name="urgencias" required disabled>
                <option value="Si" {{ $beneficiarioInteres->urgencias == 'Si' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $beneficiarioInteres->urgencias == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        </div>
        </form>
@endsection
        