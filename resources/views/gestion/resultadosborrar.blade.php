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
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $beneficiario->email }}" placeholder="ejemplo@gmail.com" required readonly>
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
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-select" required disabled>
                    <option value="Hombre" {{ $beneficiario->sexo == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                    <option value="Mujer" {{ $beneficiario->sexo == 'Mujer' ? 'selected' : '' }}>Mujer</option>
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
                    @foreach (['Álava/Araba', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Baleares', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gerona/Girona', 'Granada', 'Guadalajara', 'Guipúzcoa/Gipuzkoa', 'Huelva', 'Huesca', 'Jaén', 'La Coruña/A Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lérida/Lleida', 'Lugo', 'Madrid', 'Málaga', 'Melilla', 'Murcia', 'Navarra', 'Orense/Ourense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya/Bizkaia', 'Zamora', 'Zaragoza'] as $provincia)
                        <option value="{{ $provincia }}" {{ $beneficiario->provincia == $provincia ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="num_seguridad_social" class="form-label">Número de la Seguridad Social</label>
                    <input type="text" id="num_seguridad_social" name="num_seguridad_social" class="form-control" value="{{ $beneficiario->num_seguridad_social }}" placeholder="Número de la Seguridad Social" required readonly>
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
                    <label for="autonomia_personal" class="form-label">Autonomía personal</label>
                    <select id="autonomia_personal" name="autonomia_personal" class="form-select" required disabled>
                        @foreach(['ABVD_sin_ayuda', 'ABVD_con_ayuda', 'Se_desplaza_sin_ayuda', 'Se_desplaza_con_ayuda', 'Relacion_con_el_entorno', 'Soledad'] as $opcion)
                            <option value="{{ $opcion }}" {{ $beneficiario->autonomia_personal == $opcion ? 'selected' : '' }}>{{ str_replace('_', ' ', $opcion) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="situacion_familiar" class="form-label">Situación familiar</label>
                    <select id="situacion_familiar" name="situacion_familiar" class="form-select" required disabled>
                        @foreach(['Vive_solo', 'Acompañado', 'Vivienda_tutelada'] as $opcion)
                            <option value="{{ $opcion }}" {{ $beneficiario->situacion_familiar == $opcion ? 'selected' : '' }}>{{ str_replace('_', ' ', $opcion) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="situacion_sanitaria" class="form-label">Situación sanitaria</label>
                    <input type="text" id="situacion_sanitaria" name="situacion_sanitaria" class="form-control" value="{{ $beneficiario->situacion_sanitaria }}" placeholder="Enfermedades, intervenciones quirúrgicas, etc." required readonly>
                </div>
                <div class="col-md-6">
                    <label for="situacion_de_la_vivienda" class="form-label">Situación de la vivienda</label>
                    <input type="text" id="situacion_de_la_vivienda" name="situacion_de_la_vivienda" class="form-control" value="{{ $beneficiario->situacion_de_la_vivienda }}" placeholder="Barreras arquitectónicas,tipo de vivienda y ubicacion" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="situacion_economica" class="form-label">Situación económica</label>
                    <input type="text" id="situacion_economica" name="situacion_economica" class="form-control" value="{{ $beneficiario->situacion_economica }}" placeholder="Pensión, ingresos, ayudas... aportación al servicio" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="otros_recursos" class="form-label">Otros recursos a los que tiene acceso</label>
                    <input type="text" id="otros_recursos" name="otros_recursos" class="form-control" value="{{ $beneficiario->otros_recursos }}" placeholder="Centro de dia, de respiro familiar, ocupacional, SAD, etc" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="instalacion_de_terminal" class="form-label">Instalación de terminal/UCR</label>
                    <input type="text" id="instalacion_de_terminal" name="instalacion_de_terminal" class="form-control" value="{{ $beneficiario->instalacion_de_terminal }}" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="otros_complementos_TAS" class="form-label">Otros complementos TAS avanzado</label>
                    <select id="otros_complementos_TAS" name="otros_complementos_TAS" class="form-select" required disabled>
                        @foreach(['no_tiene', 'detector_de_humos', 'gas', 'movimiento/inactividad', 'dispensador_de_medicación', 'detector_de_caidas', 'asistente_de_voz', 'telemedicina', 'otro'] as $complemento)
                            <option value="{{ $complemento }}" {{ $beneficiario->otros_complementos_TAS == $complemento ? 'selected' : '' }}>{{ str_replace('_', ' ', $complemento) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="dispone_de_teleasistencia_movil" class="form-label">Dispone de teleasistencia móvil</label>
                    <select id="dispone_de_teleasistencia_movil" name="dispone_de_teleasistencia_movil" class="form-select" required disabled>
                        <option value="no" {{ $beneficiario->dispone_de_teleasistencia_movil == 'no' ? 'selected' : '' }}>No</option>
                        <option value="si" {{ $beneficiario->dispone_de_teleasistencia_movil == 'si' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sistema_de_telelocalizacion" class="form-label">Sistema de telelocalización</label>
                    <select id="sistema_de_telelocalizacion" name="sistema_de_telelocalizacion" class="form-select" required disabled>
                        <option value="no" {{ $beneficiario->sistema_de_telelocalizacion == 'no' ? 'selected' : '' }}>No</option>
                        <option value="si" {{ $beneficiario->sistema_de_telelocalizacion == 'si' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="custodia_de_llaves" class="form-label">Custodia de llaves</label>
                    <select id="custodia_de_llaves" name="custodia_de_llaves" class="form-select" required disabled>
                        <option value="no" {{ $beneficiario->custodia_de_llaves == 'no' ? 'selected' : '' }}>No</option>
                        <option value="si" {{ $beneficiario->custodia_de_llaves == 'si' ? 'selected' : '' }}>Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="enfermedades" class="form-label">Enfermedades</label>
                    <input type="text" id="enfermedades" name="enfermedades" class="form-control" value="{{ $beneficiario->beneficiarioInteres->enfermedades }}" placeholder="Enfermedades" readonly>
                </div>
                <div class="col-md-6">
                    <label for="alergias" class="form-label">Alergias</label>
                    <input type="text" id="alergias" name="alergias" class="form-control" value="{{ $beneficiario->beneficiarioInteres->alergias }}" placeholder="Alergias" readonly>
                </div>
                <div class="col-md-4">
                    <label for="medicacion_manana" class="form-label">Medicación Mañana</label>
                    <input type="text" id="medicacion_manana" name="medicacion_manana" class="form-control" value="{{ $beneficiario->beneficiarioInteres->medicacion_manana }}" placeholder="Medicación Mañana" readonly>
                </div>
                <div class="col-md-4">
                    <label for="medicacion_tarde" class="form-label">Medicación Tarde</label>
                    <input type="text" id="medicacion_tarde" name="medicacion_tarde" class="form-control" value="{{ $beneficiario->beneficiarioInteres->medicacion_tarde }}" placeholder="Medicación Tarde" readonly>
                </div>
                <div class="col-md-4">
                    <label for="medicacion_noche" class="form-label">Medicación Noche</label>
                    <input type="text" id="medicacion_noche" name="medicacion_noche" class="form-control" value="{{ $beneficiario->beneficiarioInteres->medicacion_noche }}" placeholder="Medicación Noche" readonly>
                </div>
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="3" readonly>{{ $beneficiario->observaciones }}</textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-danger px-5">Borrar</button>
        </div>
    </form>
</div>
@endsection
