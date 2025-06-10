@extends('layouts.app')

@section('title', 'Modificación de personas de contacto')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('gestion.contactos.buscar.mod') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Modificación de personas de contacto</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">

    <form method="POST" action="{{ route('gestion.contactos.modificar') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="dni_beneficiario" class="form-label">DNI del beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" class="form-control" value="{{ $contacto->dni_beneficiario }}" placeholder="DNI del beneficiario" required readonly>
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $contacto->nombre }}" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ $contacto->apellidos }}" placeholder="Apellidos" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $contacto->telefono }}" placeholder="Teléfono" required>
            </div>
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo de contacto</label>
                <select id="tipo" name="tipo" class="form-select" required>
                    <option value="Familiar" {{ $contacto->tipo == 'Familiar' ? 'selected' : '' }}>Familiar</option>
                    <option value="Amigo o vecino" {{ $contacto->tipo == 'Amigo o vecino' ? 'selected' : '' }}>Amigo o vecino</option>
                    <option value="Asistente" {{ $contacto->tipo == 'Asistente' ? 'selected' : '' }}>Asistente</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $contacto->email }}" placeholder="Email" required>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $contacto->direccion }}" placeholder="Dirección" required>
            </div>
            <div class="col-md-4">
                <label for="codigopostal" class="form-label">Código Postal</label>
                <input type="text" id="codigopostal" name="codigopostal" class="form-control" value="{{ $contacto->codigopostal }}" placeholder="Código Postal" required>
            </div>
            <div class="col-md-4">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" id="localidad" name="localidad" class="form-control" value="{{ $contacto->localidad }}" placeholder="Localidad" required>
            </div>
            <div class="col-md-4">
                <label for="provincia" class="form-label">Provincia</label>
                <select id="provincia" name="provincia" class="form-select" required>
                    @foreach (['Álava/Araba', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Baleares', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gerona/Girona', 'Granada', 'Guadalajara', 'Guipúzcoa/Gipuzkoa', 'Huelva', 'Huesca', 'Jaén', 'La Coruña/A Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lérida/Lleida', 'Lugo', 'Madrid', 'Málaga', 'Melilla', 'Murcia', 'Navarra', 'Orense/Ourense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya/Bizkaia', 'Zamora', 'Zaragoza'] as $provincia)
                        <option value="{{ $provincia }}" {{ $contacto->provincia == $provincia ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="dispone_llave_del_domicilio" class="form-label">Tiene disponible la llave del domicilio del usuario/a</label>
                <select id="dispone_llave_del_domicilio" name="dispone_llave_del_domicilio" class="form-select" required>
                    <option value="">Seleccionar</option>
                    <option value="Si" {{ $contacto->dispone_llave_del_domicilio == 'Si' ? 'selected' : '' }}>Sí</option>
                    <option value="No" {{ $contacto->dispone_llave_del_domicilio == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="3">{{ $contacto->observaciones }}</textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Modificar contacto</button>
        </div>
    </form>
</div>
@endsection
