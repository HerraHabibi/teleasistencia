{{-- resources/views/gestion/interes.blade.php --}}

@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Modificar personas de contacto')
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
<form class="beneficiary-form" method="post" action="{{ route('gestion.contactos.modificar') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-grid">
        <div class="form-group">
            <label for="dni_beneficiario">DNI del beneficiario</label>
            <input type="text" id="dni_beneficiario" name="dni_beneficiario" value="{{ $contacto->dni_beneficiario }}" placeholder="DNI del beneficiario" required readonly/>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $contacto->nombre }}" placeholder="Nombre" required />
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ $contacto->apellidos }}" placeholder="Apellidos" required />
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="{{ $contacto->telefono }}" placeholder="Teléfono" required />
        </div>
        <div class="form-group">
            <label for="tipo">Tipo de Contacto</label>
            <input type="text" id="tipo" name="tipo" value="{{ $contacto->tipo }}" placeholder="Tipo de Contacto" />
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ $contacto->direccion }}" placeholder="Dirección" />
        </div>
        <div class="form-group">
            <label for="codigopostal">Código Postal</label>
            <input type="text" id="codigopostal" name="codigopostal" value="{{ $contacto->codigopostal }}" placeholder="Código Postal" />
        </div>
        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" id="localidad" name="localidad" value="{{ $contacto->localidad }}" placeholder="Localidad" />
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" id="provincia" name="provincia" value="{{ $contacto->provincia }}" placeholder="Provincia" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $contacto->email }}" placeholder="Email" />
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn-submit">Modificar contacto</button>
    </div>
</form>
@endsection
