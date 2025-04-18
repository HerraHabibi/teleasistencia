@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Borrar beneficiario')
@section('ruta_volver', route('gestion.index'))
@section('content')
    <form class="beneficiary-form" method="post" action="{{ route('gestion.eliminar.beneficiario', $beneficiario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="form-grid">
            <div class="form-group">
                <label for="nombre">Nombre y apellidos</label>
                <input type="text" id="nombre" name="nombre" value="{{ $beneficiario->nombre }}" placeholder="Nombre" required readonly />
                <input type="text" id="apellidos" name="apellidos" value="{{ $beneficiario->apellidos }}" placeholder="Apellidos" required readonly />
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" id="dni" name="dni" value="{{ $beneficiario->dni }}" placeholder="DNI" required readonly />
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" id="fecha" name="fecha_nacimiento" value="{{ $beneficiario->fecha_nacimiento }}" required readonly />
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="{{ $beneficiario->telefono }}" placeholder="Número de Teléfono" required readonly />
            </div>
            <div class="form-group">
                <label for="num_ss">Número de la Seguridad Social</label>
                <input type="text" id="num_ss" name="num_seguridad_social" value="{{ $beneficiario->num_seguridad_social }}" placeholder="Número de la Seguridad Social" required readonly />
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required disabled>
                    <option value="Hombre" {{ $beneficiario->sexo == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                    <option value="Mujer" {{ $beneficiario->sexo == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estadocivil">Estado Civil</label>
                <select id="estadocivil" name="estadocivil" required disabled>
                    <option value="Soltero" {{ $beneficiario->estadocivil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Casado" {{ $beneficiario->estadocivil == 'Casado' ? 'selected' : '' }}>Casado</option>
                    <option value="Viudo" {{ $beneficiario->estadocivil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                    <option value="Viviendo en pareja" {{ $beneficiario->estadocivil == 'Viviendo en pareja' ? 'selected' : '' }}>Viviendo en pareja</option>
                    <option value="Divorciado" {{ $beneficiario->estadocivil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de beneficiario</label>
                <select id="tipo" name="tipo" required disabled>
                    <option value="Mayor de 65" {{ $beneficiario->tipo == 'Mayor de 65' ? 'selected' : '' }}>Mayor de 65</option>
                    <option value="Dependiente" {{ $beneficiario->tipo == 'Dependiente' ? 'selected' : '' }}>Dependiente</option>
                    <option value="Discapacitado" {{ $beneficiario->tipo == 'Discapacitado' ? 'selected' : '' }}>Discapacitado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ $beneficiario->direccion }}" placeholder="Dirección" required readonly />
            </div>
            <div class="form-group">
                <label for="codigopostal">Código Postal</label>
                <input type="text" id="codigopostal" name="codigo_postal" value="{{ $beneficiario->codigo_postal }}" placeholder="Código Postal" required readonly />
            </div>
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" id="localidad" name="localidad" value="{{ $beneficiario->localidad }}" placeholder="Localidad" required readonly />
            </div>
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <select id="provincia" name="provincia" required disabled>
                    @foreach (['Álava/Araba', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Baleares', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gerona/Girona', 'Granada', 'Guadalajara', 'Guipúzcoa/Gipuzkoa', 'Huelva', 'Huesca', 'Jaén', 'La Coruña/A Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lérida/Lleida', 'Lugo', 'Madrid', 'Málaga', 'Melilla', 'Murcia', 'Navarra', 'Orense/Ourense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya/Bizkaia', 'Zamora', 'Zaragoza'] as $provincia)
                        <option value="{{ $provincia }}" {{ $beneficiario->provincia == $provincia ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Borrar</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
