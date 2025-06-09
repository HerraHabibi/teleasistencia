@extends('layouts.app')

@section('title', 'Baja de beneficiario')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('gestion.borrar.beneficiario.form') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Baja de beneficiario</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('gestion.eliminar.beneficiario', $beneficiario->id) }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        @method('DELETE')
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $beneficiario->nombre }}" placeholder="Nombre" required readonly>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ $beneficiario->apellidos }}" placeholder="Apellidos" required readonly>
            </div>
            <div class="col-md-6">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" id="dni" name="dni" class="form-control" value="{{ $beneficiario->dni }}" placeholder="DNI" required readonly>
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ $beneficiario->fecha_nacimiento }}" required readonly>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ $beneficiario->telefono }}" placeholder="Número de Teléfono" required readonly>
            </div>
            <div class="col-md-6">
                <label for="num_seguridad_social" class="form-label">Número de la Seguridad Social</label>
                <input type="text" id="num_seguridad_social" name="num_seguridad_social" class="form-control" value="{{ $beneficiario->num_seguridad_social }}" placeholder="Número de la Seguridad Social" required readonly>
            </div>
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-select" required disabled>
                    <option value="Hombre" {{ $beneficiario->sexo == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                    <option value="Mujer" {{ $beneficiario->sexo == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="estado_civil" class="form-label">Estado Civil</label>
                <select id="estado_civil" name="estado_civil" class="form-select" required disabled>
                    <option value="Soltero" {{ $beneficiario->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Casado" {{ $beneficiario->estado_civil == 'Casado' ? 'selected' : '' }}>Casado</option>
                    <option value="Viudo" {{ $beneficiario->estado_civil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                    <option value="Viviendo en pareja" {{ $beneficiario->estado_civil == 'Viviendo en pareja' ? 'selected' : '' }}>Viviendo en pareja</option>
                    <option value="Divorciado" {{ $beneficiario->estado_civil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tipo_beneficiario" class="form-label">Tipo de beneficiario</label>
                <select id="tipo_beneficiario" name="tipo_beneficiario" class="form-select" required disabled>
                    <option value="Dependiente" {{ $beneficiario->tipo_beneficiario == 'Dependiente' ? 'selected' : '' }}>Dependiente</option>
                    <option value="EnfermedadCronica" {{ $beneficiario->tipo_beneficiario == 'EnfermedadCronica' ? 'selected' : '' }}>Enfermedad Crónica</option>
                    <option value="Victima_de_violencia_de_género" {{ $beneficiario->tipo_beneficiario == 'Victima_de_violencia_de_género' ? 'selected' : '' }}>Víctima de violencia de género</option>
                    <option value="Mayores_de_65" {{ $beneficiario->tipo_beneficiario == 'Mayores_de_65' ? 'selected' : '' }}>Mayores de 65 años</option>
                    <option value="Persona_con_discapacidad" {{ $beneficiario->tipo_beneficiario == 'Persona_con_discapacidad' ? 'selected' : '' }}>Persona con discapacidad</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $beneficiario->direccion }}" placeholder="Dirección" required readonly>
            </div>
            <div class="col-md-4">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" value="{{ $beneficiario->codigo_postal }}" placeholder="Código Postal" required readonly>
            </div>
            <div class="col-md-4">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" id="localidad" name="localidad" class="form-control" value="{{ $beneficiario->localidad }}" placeholder="Localidad" required readonly>
            </div>
            <div class="col-md-4">
                <label for="provincia" class="form-label">Provincia</label>
                <select id="provincia" name="provincia" class="form-select" required disabled>
                    <option value="Álava/Araba" {{ $beneficiario->provincia == 'Álava/Araba' ? 'selected' : '' }}>Álava/Araba</option>
                    <option value="Albacete" {{ $beneficiario->provincia == 'Albacete' ? 'selected' : '' }}>Albacete</option>
                    <option value="Alicante" {{ $beneficiario->provincia == 'Alicante' ? 'selected' : '' }}>Alicante</option>
                    <option value="Almería" {{ $beneficiario->provincia == 'Almería' ? 'selected' : '' }}>Almería</option>
                    <option value="Asturias" {{ $beneficiario->provincia == 'Asturias' ? 'selected' : '' }}>Asturias</option>
                    <option value="Ávila" {{ $beneficiario->provincia == 'Ávila' ? 'selected' : '' }}>Ávila</option>
                    <option value="Badajoz" {{ $beneficiario->provincia == 'Badajoz' ? 'selected' : '' }}>Badajoz</option>
                    <option value="Baleares" {{ $beneficiario->provincia == 'Baleares' ? 'selected' : '' }}>Baleares</option>
                    <option value="Barcelona" {{ $beneficiario->provincia == 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
                    <option value="Burgos" {{ $beneficiario->provincia == 'Burgos' ? 'selected' : '' }}>Burgos</option>
                    <option value="Cáceres" {{ $beneficiario->provincia == 'Cáceres' ? 'selected' : '' }}>Cáceres</option>
                    <option value="Cádiz" {{ $beneficiario->provincia == 'Cádiz' ? 'selected' : '' }}>Cádiz</option>
                    <option value="Cantabria" {{ $beneficiario->provincia == 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                    <option value="Castellón" {{ $beneficiario->provincia == 'Castellón' ? 'selected' : '' }}>Castellón</option>
                    <option value="Ceuta" {{ $beneficiario->provincia == 'Ceuta' ? 'selected' : '' }}>Ceuta</option>
                    <option value="Ciudad Real" {{ $beneficiario->provincia == 'Ciudad Real' ? 'selected' : '' }}>Ciudad Real</option>
                    <option value="Córdoba" {{ $beneficiario->provincia == 'Córdoba' ? 'selected' : '' }}>Córdoba</option>
                    <option value="Cuenca" {{ $beneficiario->provincia == 'Cuenca' ? 'selected' : '' }}>Cuenca</option>
                    <option value="Gerona/Girona" {{ $beneficiario->provincia == 'Gerona/Girona' ? 'selected' : '' }}>Gerona/Girona</option>
                    <option value="Granada" {{ $beneficiario->provincia == 'Granada' ? 'selected' : '' }}>Granada</option>
                    <option value="Guadalajara" {{ $beneficiario->provincia == 'Guadalajara' ? 'selected' : '' }}>Guadalajara</option>
                    <option value="Guipúzcoa/Gipuzkoa" {{ $beneficiario->provincia == 'Guipúzcoa/Gipuzkoa' ? 'selected' : '' }}>Guipúzcoa/Gipuzkoa</option>
                    <option value="Huelva" {{ $beneficiario->provincia == 'Huelva' ? 'selected' : '' }}>Huelva</option>
                    <option value="Huesca" {{ $beneficiario->provincia == 'Huesca' ? 'selected' : '' }}>Huesca</option>
                    <option value="Jaén" {{ $beneficiario->provincia == 'Jaén' ? 'selected' : '' }}>Jaén</option>
                    <option value="La Coruña/A Coruña" {{ $beneficiario->provincia == 'La Coruña/A Coruña' ? 'selected' : '' }}>La Coruña/A Coruña</option>
                    <option value="La Rioja" {{ $beneficiario->provincia == 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                    <option value="Las Palmas" {{ $beneficiario->provincia == 'Las Palmas' ? 'selected' : '' }}>Las Palmas</option>
                    <option value="León" {{ $beneficiario->provincia == 'León' ? 'selected' : '' }}>León</option>
                    <option value="Lérida/Lleida" {{ $beneficiario->provincia == 'Lérida/Lleida' ? 'selected' : '' }}>Lérida/Lleida</option>
                    <option value="Lugo" {{ $beneficiario->provincia == 'Lugo' ? 'selected' : '' }}>Lugo</option>
                    <option value="Madrid" {{ $beneficiario->provincia == 'Madrid' ? 'selected' : '' }}>Madrid</option>
                    <option value="Málaga" {{ $beneficiario->provincia == 'Málaga' ? 'selected' : '' }}>Málaga</option>
                    <option value="Melilla" {{ $beneficiario->provincia == 'Melilla' ? 'selected' : '' }}>Melilla</option>
                    <option value="Murcia" {{ $beneficiario->provincia == 'Murcia' ? 'selected' : '' }}>Murcia</option>
                    <option value="Navarra" {{ $beneficiario->provincia == 'Navarra' ? 'selected' : '' }}>Navarra</option>
                    <option value="Orense/Ourense" {{ $beneficiario->provincia == 'Orense/Ourense' ? 'selected' : '' }}>Orense/Ourense</option>
                    <option value="Palencia" {{ $beneficiario->provincia == 'Palencia' ? 'selected' : '' }}>Palencia</option>
                    <option value="Pontevedra" {{ $beneficiario->provincia == 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                    <option value="Salamanca" {{ $beneficiario->provincia == 'Salamanca' ? 'selected' : '' }}>Salamanca</option>
                    <option value="Segovia" {{ $beneficiario->provincia == 'Segovia' ? 'selected' : '' }}>Segovia</option>
                    <option value="Sevilla" {{ $beneficiario->provincia == 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                    <option value="Soria" {{ $beneficiario->provincia == 'Soria' ? 'selected' : '' }}>Soria</option>
                    <option value="Tarragona" {{ $beneficiario->provincia == 'Tarragona' ? 'selected' : '' }}>Tarragona</option>
                    <option value="Tenerife" {{ $beneficiario->provincia == 'Tenerife' ? 'selected' : '' }}>Tenerife</option>
                    <option value="Teruel" {{ $beneficiario->provincia == 'Teruel' ? 'selected' : '' }}>Teruel</option>
                    <option value="Toledo" {{ $beneficiario->provincia == 'Toledo' ? 'selected' : '' }}>Toledo</option>
                    <option value="Valencia" {{ $beneficiario->provincia == 'Valencia' ? 'selected' : '' }}>Valencia</option>
                    <option value="Valladolid" {{ $beneficiario->provincia == 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                    <option value="Vizcaya/Bizkaia" {{ $beneficiario->provincia == 'Vizcaya/Bizkaia' ? 'selected' : '' }}>Vizcaya/Bizkaia</option>
                    <option value="Zamora" {{ $beneficiario->provincia == 'Zamora' ? 'selected' : '' }}>Zamora</option>
                    <option value="Zaragoza" {{ $beneficiario->provincia == 'Zaragoza' ? 'selected' : '' }}>Zaragoza</option>
                </select>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-danger px-5">Borrar</button>
        </div>
    </form>
</div>
@endsection
