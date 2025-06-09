@extends('layouts.app')

@section('title', 'Alta beneficiario')

@section('content')

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('gestion.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Alta de beneficiario</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('gestion.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
            </div>
            <div class="col-md-6">
                <label for="dni" class="form-label">DNI <a href="https://generadordni.es/#dni" target="_blank">Generar</a></label>
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="ejemplo@gmail.com" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Número de Teléfono" required>
            </div>
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-select" required>
                    <option value="">Seleccionar</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
            </div>
            <div class="col-md-4">
                <label for="codigo_postal" class="form-label">Código Postal <a href="https://www.correos.es/es/es/herramientas/codigos-postales/detalle" target="_blank">Consultar</a></label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" placeholder="Código Postal" required>
            </div>
            <div class="col-md-4">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" required>
            </div>
            <div class="col-md-4">
                <label for="provincia" class="form-label">Provincia</label>
                <select id="provincia" name="provincia" class="form-select" required>
                    <option value="Álava/Araba">Álava/Araba</option>
                    <option value="Albacete">Albacete</option>
                    <option value="Alicante">Alicante</option>
                    <option value="Almería">Almería</option>
                    <option value="Asturias">Asturias</option>
                    <option value="Ávila">Ávila</option>
                    <option value="Badajoz">Badajoz</option>
                    <option value="Baleares">Baleares</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Burgos">Burgos</option>
                    <option value="Cáceres">Cáceres</option>
                    <option value="Cádiz">Cádiz</option>
                    <option value="Cantabria">Cantabria</option>
                    <option value="Castellón">Castellón</option>
                    <option value="Ceuta">Ceuta</option>
                    <option value="Ciudad Real">Ciudad Real</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Cuenca">Cuenca</option>
                    <option value="Gerona/Girona">Gerona/Girona</option>
                    <option value="Granada">Granada</option>
                    <option value="Guadalajara">Guadalajara</option>
                    <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                    <option value="Huelva">Huelva</option>
                    <option value="Huesca">Huesca</option>
                    <option value="Jaén">Jaén</option>
                    <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Las Palmas">Las Palmas</option>
                    <option value="León">León</option>
                    <option value="Lérida/Lleida">Lérida/Lleida</option>
                    <option value="Lugo">Lugo</option>
                    <option value="Madrid">Madrid</option>
                    <option value="Málaga">Málaga</option>
                    <option value="Melilla">Melilla</option>
                    <option value="Murcia">Murcia</option>
                    <option value="Navarra">Navarra</option>
                    <option value="Orense/Ourense">Orense/Ourense</option>
                    <option value="Palencia">Palencia</option>
                    <option value="Pontevedra">Pontevedra</option>
                    <option value="Salamanca">Salamanca</option>
                    <option value="Segovia">Segovia</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Soria">Soria</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Tenerife">Tenerife</option>
                    <option value="Teruel">Teruel</option>
                    <option value="Toledo">Toledo</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Valladolid">Valladolid</option>
                    <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                    <option value="Zamora">Zamora</option>
                    <option value="Zaragoza">Zaragoza</option>
                </select>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="num_seguridad_social" class="form-label">Número de la Seguridad Social <a href="https://generadordni.es/#otrosdc" target="_blank">Generar</a></label>
                    <input type="text" id="num_seguridad_social" name="num_seguridad_social" class="form-control" placeholder="Número de la Seguridad Social" required>
                </div>
                <div class="col-md-6">
                    <label for="estado_civil" class="form-label">Estado Civil</label>
                    <select id="estado_civil" name="estado_civil" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Viudo">Viudo</option>
                        <option value="Viviendo en pareja">Viviendo en pareja</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="tipo_beneficiario" class="form-label">Tipo de beneficiario</label>
                    <select id="tipo_beneficiario" name="tipo_beneficiario" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Dependiente">Dependiente</option>
                        <option value="EnfermedadCronica">Enfermedad Crónica</option>
                        <option value="Victima_de_violencia_de_género">Víctima de violencia de género</option>
                        <option value="Mayores_de_65">Mayores de 65 años</option>
                        <option value="Persona_con_discapacidad">Persona con discapacidad</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="autonomia_personal" class="form-label">Autonomía personal</label>
                    <select id="autonomia_personal" name="autonomia_personal" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="ABVD_sin_ayuda">ABVD sin ayuda</option>
                        <option value="ABVD_con_ayuda">ABVD con ayuda</option>
                        <option value="Se_desplaza_sin_ayuda">Se desplaza sin ayuda</option>
                        <option value="Se_desplaza_con_ayuda">Se desplaza con ayuda</option>
                        <option value="Relacion_con_el_entorno">Relación con el entorno</option>
                        <option value="Soledad">Soledad</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="situacion_familiar" class="form-label">Situación familiar</label>
                    <select id="situacion_familiar" name="situacion_familiar" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Vive_solo">Vive solo</option>
                        <option value="Acompañado">Acompañado</option>
                        <option value="Vivienda_tutelada">Vivienda tutelada</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="situacion_sanitaria" class="form-label">Situación sanitaria</label>
                    <input type="text" id="situacion_sanitaria" name="situacion_sanitaria" class="form-control" placeholder="Enfermedades, intervenciones quirúrgicas, etc." required>
                </div>
                <div class="col-md-6">
                    <label for="situacion_de_la_vivienda" class="form-label">Situación de la vivienda</label>
                    <input type="text" id="situacion_de_la_vivienda" name="situacion_de_la_vivienda" class="form-control" placeholder="Barreras arquitectónicas,tipo de vivienda y ubicacion" required>
                </div>
                <div class="col-md-6">
                    <label for="situacion_economica" class="form-label">Situación económica</label>
                    <input type="text" id="situacion_economica" name="situacion_economica" class="form-control" placeholder="Pensión, ingresos, ayudas... aportación al servicio" required>
                </div>
                <div class="col-md-6">
                    <label for="otros_recursos" class="form-label">Otros recursos a los que tiene acceso</label>
                    <input type="text" id="otros_recursos" name="otros_recursos" class="form-control" placeholder="Centro de dia, de respiro familiar, ocupacional, SAD, etc" required>
                </div>
                <div class="col-md-6">
                    <label for="instalacion_de_terminal" class="form-label">Instalación de terminal/UCR</label>
                    <input type="text" id="instalacion_de_terminal" name="instalacion_de_terminal" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="otros_complementos_TAS" class="form-label">Otros complementos TAS avanzado</label>
                    <select id="otros_complementos_TAS" name="otros_complementos_TAS" class="form-select" required>
                        <option value="no_tiene">No tiene</option>
                        <option value="detector_de_humos">Detector de humos</option>
                        <option value="gas">Gas</option>
                        <option value="movimiento/inactividad">Movimiento/inactividad</option>
                        <option value="dispensador_de_medicación">Dispensador de medicación</option>
                        <option value="detector_de_caidas">Detector de caídas</option>
                        <option value="asistente_de_voz">Asistente de voz</option>
                        <option value="telemedicina">Telemedicina</option>
                        <option value="otro">Otro (especificar en observaciones)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="dispone_de_teleasistencia_movil" class="form-label">Dispone de teleasistencia móvil</label>
                    <select id="dispone_de_teleasistencia_movil" name="dispone_de_teleasistencia_movil" class="form-select" required>
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sistema_de_telelocalizacion" class="form-label">Sistema de telelocalización</label>
                    <select id="sistema_de_telelocalizacion" name="sistema_de_telelocalizacion" class="form-select" required>
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="custodia_de_llaves" class="form-label">Custodia de llaves</label>
                    <select id="custodia_de_llaves" name="custodia_de_llaves" class="form-select" required>
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="enfermedades" class="form-label">Enfermedades (opcional)</label>
                    <input type="text" id="enfermedades" name="enfermedades" class="form-control" placeholder="Enfermedades">
                </div>
                <div class="col-md-6">
                    <label for="alergias" class="form-label">Alergias (opcional)</label>
                    <input type="text" id="alergias" name="alergias" class="form-control" placeholder="Alergias">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_manana" class="form-label">Medicación Mañana (opcional)</label>
                    <input type="text" id="medicacion_manana" name="medicacion_manana" class="form-control" placeholder="Medicación Mañana">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_tarde" class="form-label">Medicación Tarde (opcional)</label>
                    <input type="text" id="medicacion_tarde" name="medicacion_tarde" class="form-control" placeholder="Medicación Tarde">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_noche" class="form-label">Medicación Noche (opcional)</label>
                    <input type="text" id="medicacion_noche" name="medicacion_noche" class="form-control" placeholder="Medicación Noche">
                </div>
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Guardar</button>
        </div>
    </form>
</div>
@endsection
