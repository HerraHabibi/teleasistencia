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
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `
                <ul style="text-align: left; margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `
        });
    </script>
@endif



    <form method="POST" action="{{ route('gestion.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" value="{{ old('apellidos') }}" required>
            </div>
            <div class="col-md-6">
                <label for="dni" class="form-label">DNI <a href="https://generadordni.es/#dni" target="_blank">Generar</a></label>
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" value="{{ old('dni') }}" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="ejemplo@gmail.com" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Número de Teléfono" value="{{ old('telefono') }}" required>
            </div>
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-select" required>
                    <option value="">Seleccionar</option>
                    <option value="Hombre" @selected(old('sexo') == 'Hombre')>Hombre</option>
                    <option value="Mujer" @selected(old('sexo') == 'Mujer')>Mujer</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" value="{{ old('direccion') }}" required>
            </div>
            <div class="col-md-4">
                <label for="codigo_postal" class="form-label">Código Postal <a href="https://www.correos.es/es/es/herramientas/codigos-postales/detalle" target="_blank">Consultar</a></label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" placeholder="Código Postal" value="{{ old('codigo_postal') }}" required>
            </div>
            <div class="col-md-4">
                <label for="localidad" class="form-label">Localidad</label>
                <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" value="{{ old('localidad') }}" required>
            </div>
            <div class="col-md-4">
                <label for="provincia" class="form-label">Provincia</label>
                <select id="provincia" name="provincia" class="form-select" required>
                    <option value="Álava/Araba" @selected(old('provincia') == 'Álava/Araba')>Álava/Araba</option>
                    <option value="Albacete" @selected(old('provincia') == 'Albacete')>Albacete</option>
                    <option value="Alicante" @selected(old('provincia') == 'Alicante')>Alicante</option>
                    <option value="Almería" @selected(old('provincia') == 'Almería')>Almería</option>
                    <option value="Asturias" @selected(old('provincia') == 'Asturias')>Asturias</option>
                    <option value="Ávila" @selected(old('provincia') == 'Ávila')>Ávila</option>
                    <option value="Badajoz" @selected(old('provincia') == 'Badajoz')>Badajoz</option>
                    <option value="Baleares" @selected(old('provincia') == 'Baleares')>Baleares</option>
                    <option value="Barcelona" @selected(old('provincia') == 'Barcelona')>Barcelona</option>
                    <option value="Burgos" @selected(old('provincia') == 'Burgos')>Burgos</option>
                    <option value="Cáceres" @selected(old('provincia') == 'Cáceres')>Cáceres</option>
                    <option value="Cádiz" @selected(old('provincia') == 'Cádiz')>Cádiz</option>
                    <option value="Cantabria" @selected(old('provincia') == 'Cantabria')>Cantabria</option>
                    <option value="Castellón" @selected(old('provincia') == 'Castellón')>Castellón</option>
                    <option value="Ceuta" @selected(old('provincia') == 'Ceuta')>Ceuta</option>
                    <option value="Ciudad Real" @selected(old('provincia') == 'Ciudad Real')>Ciudad Real</option>
                    <option value="Córdoba" @selected(old('provincia') == 'Córdoba')>Córdoba</option>
                    <option value="Cuenca" @selected(old('provincia') == 'Cuenca')>Cuenca</option>
                    <option value="Gerona/Girona" @selected(old('provincia') == 'Gerona/Girona')>Gerona/Girona</option>
                    <option value="Granada" @selected(old('provincia') == 'Granada')>Granada</option>
                    <option value="Guadalajara" @selected(old('provincia') == 'Guadalajara')>Guadalajara</option>
                    <option value="Guipúzcoa/Gipuzkoa" @selected(old('provincia') == 'Guipúzcoa/Gipuzkoa')>Guipúzcoa/Gipuzkoa</option>
                    <option value="Huelva" @selected(old('provincia') == 'Huelva')>Huelva</option>
                    <option value="Huesca" @selected(old('provincia') == 'Huesca')>Huesca</option>
                    <option value="Jaén" @selected(old('provincia') == 'Jaén')>Jaén</option>
                    <option value="La Coruña/A Coruña" @selected(old('provincia') == 'La Coruña/A Coruña')>La Coruña/A Coruña</option>
                    <option value="La Rioja" @selected(old('provincia') == 'La Rioja')>La Rioja</option>
                    <option value="Las Palmas" @selected(old('provincia') == 'Las Palmas')>Las Palmas</option>
                    <option value="León" @selected(old('provincia') == 'León')>León</option>
                    <option value="Lérida/Lleida" @selected(old('provincia') == 'Lérida/Lleida')>Lérida/Lleida</option>
                    <option value="Lugo" @selected(old('provincia') == 'Lugo')>Lugo</option>
                    <option value="Madrid" @selected(old('provincia') == 'Madrid')>Madrid</option>
                    <option value="Málaga" @selected(old('provincia') == 'Málaga')>Málaga</option>
                    <option value="Melilla" @selected(old('provincia') == 'Melilla')>Melilla</option>
                    <option value="Murcia" @selected(old('provincia') == 'Murcia')>Murcia</option>
                    <option value="Navarra" @selected(old('provincia') == 'Navarra')>Navarra</option>
                    <option value="Orense/Ourense" @selected(old('provincia') == 'Orense/Ourense')>Orense/Ourense</option>
                    <option value="Palencia" @selected(old('provincia') == 'Palencia')>Palencia</option>
                    <option value="Pontevedra" @selected(old('provincia') == 'Pontevedra')>Pontevedra</option>
                    <option value="Salamanca" @selected(old('provincia') == 'Salamanca')>Salamanca</option>
                    <option value="Segovia" @selected(old('provincia') == 'Segovia')>Segovia</option>
                    <option value="Sevilla" @selected(old('provincia') == 'Sevilla')>Sevilla</option>
                    <option value="Soria" @selected(old('provincia') == 'Soria')>Soria</option>
                    <option value="Tarragona" @selected(old('provincia') == 'Tarragona')>Tarragona</option>
                    <option value="Tenerife" @selected(old('provincia') == 'Tenerife')>Tenerife</option>
                    <option value="Teruel" @selected(old('provincia') == 'Teruel')>Teruel</option>
                    <option value="Toledo" @selected(old('provincia') == 'Toledo')>Toledo</option>
                    <option value="Valencia" @selected(old('provincia') == 'Valencia')>Valencia</option>
                    <option value="Valladolid" @selected(old('provincia') == 'Valladolid')>Valladolid</option>
                    <option value="Vizcaya/Bizkaia" @selected(old('provincia') == 'Vizcaya/Bizkaia')>Vizcaya/Bizkaia</option>
                    <option value="Zamora" @selected(old('provincia') == 'Zamora')>Zamora</option>
                    <option value="Zaragoza" @selected(old('provincia') == 'Zaragoza')>Zaragoza</option>
                </select>
            </div>
            
            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label for="num_seguridad_social" class="form-label">Número de la Seguridad Social <a href="https://generadordni.es/#otrosdc" target="_blank">Generar</a></label>
                    <input type="text" id="num_seguridad_social" name="num_seguridad_social" class="form-control" placeholder="Número de la Seguridad Social" value="{{ old('num_seguridad_social') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="estado_civil" class="form-label">Estado Civil</label>
                    <select id="estado_civil" name="estado_civil" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Soltero" @selected(old('estado_civil') == 'Soltero')>Soltero</option>
                        <option value="Casado" @selected(old('estado_civil') == 'Casado')>Casado</option>
                        <option value="Viudo" @selected(old('estado_civil') == 'Viudo')>Viudo</option>
                        <option value="Viviendo en pareja" @selected(old('estado_civil') == 'Viviendo en pareja')>Viviendo en pareja</option>
                        <option value="Divorciado" @selected(old('estado_civil') == 'Divorciado')>Divorciado</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="tipo_beneficiario" class="form-label">Tipo de beneficiario</label>
                    <select id="tipo_beneficiario" name="tipo_beneficiario" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Dependiente" @selected(old('tipo_beneficiario') == 'Dependiente')>Dependiente</option>
                        <option value="EnfermedadCronica" @selected(old('tipo_beneficiario') == 'EnfermedadCronica')>Enfermedad Crónica</option>
                        <option value="Victima_de_violencia_de_género" @selected(old('tipo_beneficiario') == 'Victima_de_violencia_de_género')>Víctima de violencia de género</option>
                        <option value="Mayores_de_65" @selected(old('tipo_beneficiario') == 'Mayores_de_65')>Mayores de 65 años</option>
                        <option value="Persona_con_discapacidad" @selected(old('tipo_beneficiario') == 'Persona_con_discapacidad')>Persona con discapacidad</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="autonomia_personal" class="form-label">Autonomía personal</label>
                    <select id="autonomia_personal" name="autonomia_personal" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="ABVD_sin_ayuda" @selected(old('autonomia_personal') == 'ABVD_sin_ayuda')>ABVD sin ayuda</option>
                        <option value="ABVD_con_ayuda" @selected(old('autonomia_personal') == 'ABVD_con_ayuda')>ABVD con ayuda</option>
                        <option value="Se_desplaza_sin_ayuda" @selected(old('autonomia_personal') == 'Se_desplaza_sin_ayuda')>Se desplaza sin ayuda</option>
                        <option value="Se_desplaza_con_ayuda" @selected(old('autonomia_personal') == 'Se_desplaza_con_ayuda')>Se desplaza con ayuda</option>
                        <option value="Relacion_con_el_entorno" @selected(old('autonomia_personal') == 'Relacion_con_el_entorno')>Relación con el entorno</option>
                        <option value="Soledad" @selected(old('autonomia_personal') == 'Soledad')>Soledad</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="situacion_familiar" class="form-label">Situación familiar</label>
                    <select id="situacion_familiar" name="situacion_familiar" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Vive_solo" @selected(old('situacion_familiar') == 'Vive_solo')>Vive solo</option>
                        <option value="Acompañado" @selected(old('situacion_familiar') == 'Acompañado')>Acompañado</option>
                        <option value="Vivienda_tutelada" @selected(old('situacion_familiar') == 'Vivienda_tutelada')>Vivienda tutelada</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="situacion_sanitaria" class="form-label">Situación sanitaria</label>
                    <input type="text" id="situacion_sanitaria" name="situacion_sanitaria" class="form-control" placeholder="Enfermedades, intervenciones quirúrgicas, etc." value="{{ old('situacion_sanitaria') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="situacion_de_la_vivienda" class="form-label">Situación de la vivienda</label>
                    <input type="text" id="situacion_de_la_vivienda" name="situacion_de_la_vivienda" class="form-control" placeholder="Barreras arquitectónicas,tipo de vivienda y ubicacion" value="{{ old('situacion_de_la_vivienda') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="situacion_economica" class="form-label">Situación económica</label>
                    <input type="text" id="situacion_economica" name="situacion_economica" class="form-control" placeholder="Pensión, ingresos, ayudas... aportación al servicio" value="{{ old('situacion_economica') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="otros_recursos" class="form-label">Otros recursos a los que tiene acceso</label>
                    <input type="text" id="otros_recursos" name="otros_recursos" class="form-control" placeholder="Centro de dia, de respiro familiar, ocupacional, SAD, etc" value="{{ old('otros_recursos') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="instalacion_de_terminal" class="form-label">Instalación de terminal/UCR</label>
                    <input type="text" id="instalacion_de_terminal" name="instalacion_de_terminal" class="form-control" value="{{ old('instalacion_de_terminal') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="otros_complementos_TAS" class="form-label">Otros complementos TAS avanzado</label>
                    <select id="otros_complementos_TAS" name="otros_complementos_TAS" class="form-select" required>
                        <option value="no_tiene" @selected(old('otros_complementos_TAS') == 'no_tiene')>No tiene</option>
                        <option value="detector_de_humos" @selected(old('otros_complementos_TAS') == 'detector_de_humos')>Detector de humos</option>
                        <option value="gas" @selected(old('otros_complementos_TAS') == 'gas')>Gas</option>
                        <option value="movimiento/inactividad" @selected(old('otros_complementos_TAS') == 'movimiento/inactividad')>Movimiento/inactividad</option>
                        <option value="dispensador_de_medicación" @selected(old('otros_complementos_TAS') == 'dispensador_de_medicación')>Dispensador de medicación</option>
                        <option value="detector_de_caidas" @selected(old('otros_complementos_TAS') == 'detector_de_caidas')>Detector de caídas</option>
                        <option value="asistente_de_voz" @selected(old('otros_complementos_TAS') == 'asistente_de_voz')>Asistente de voz</option>
                        <option value="telemedicina" @selected(old('otros_complementos_TAS') == 'telemedicina')>Telemedicina</option>
                        <option value="otro" @selected(old('otros_complementos_TAS') == 'otro')>Otro (especificar en observaciones)</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="dispone_de_teleasistencia_movil" class="form-label">Dispone de teleasistencia móvil</label>
                    <select id="dispone_de_teleasistencia_movil" name="dispone_de_teleasistencia_movil" class="form-select" required>
                        <option value="no" @selected(old('dispone_de_teleasistencia_movil') == 'no')>No</option>
                        <option value="si" @selected(old('dispone_de_teleasistencia_movil') == 'si')>Sí</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="sistema_de_telelocalizacion" class="form-label">Sistema de telelocalización</label>
                    <select id="sistema_de_telelocalizacion" name="sistema_de_telelocalizacion" class="form-select" required>
                        <option value="no" @selected(old('sistema_de_telelocalizacion') == 'no')>No</option>
                        <option value="si" @selected(old('sistema_de_telelocalizacion') == 'si')>Sí</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="custodia_de_llaves" class="form-label">Custodia de llaves</label>
                    <select id="custodia_de_llaves" name="custodia_de_llaves" class="form-select" required>
                        <option value="no" @selected(old('custodia_de_llaves') == 'no')>No</option>
                        <option value="si" @selected(old('custodia_de_llaves') == 'si')>Sí</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label for="enfermedades" class="form-label">Enfermedades (opcional)</label>
                    <input type="text" id="enfermedades" name="enfermedades" class="form-control" placeholder="Enfermedades" value="{{ old('enfermedades') }}">
                </div>
                <div class="col-md-6">
                    <label for="alergias" class="form-label">Alergias (opcional)</label>
                    <input type="text" id="alergias" name="alergias" class="form-control" placeholder="Alergias" value="{{ old('alergias') }}">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_manana" class="form-label">Medicación Mañana (opcional)</label>
                    <input type="text" id="medicacion_manana" name="medicacion_manana" class="form-control" placeholder="Medicación Mañana" value="{{ old('medicacion_manana') }}">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_tarde" class="form-label">Medicación Tarde (opcional)</label>
                    <input type="text" id="medicacion_tarde" name="medicacion_tarde" class="form-control" placeholder="Medicación Tarde" value="{{ old('medicacion_tarde') }}">
                </div>
                <div class="col-md-4">
                    <label for="medicacion_noche" class="form-label">Medicación Noche (opcional)</label>
                    <input type="text" id="medicacion_noche" name="medicacion_noche" class="form-control" placeholder="Medicación Noche" value="{{ old('medicacion_noche') }}">
                </div>
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="3" value="{{ old('observaciones') }}"></textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Guardar</button>
        </div>
    </form>
</div>
@endsection
