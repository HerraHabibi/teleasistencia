@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Modificar la búsqueda')
@section('ruta_volver', route('gestion.index'))
@section('content')
    <form class="beneficiary-form" method="post" action="{{ route('gestion.actualizar.beneficiario', $beneficiario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="form-grid">
            <div class="form-group">
                <label for="nombre">Nombre y apellidos</label>
                <input type="text" id="nombre" name="nombre" value="{{ $beneficiario->nombre }}" placeholder="Nombre" required />
                <input type="text" id="apellidos" name="apellidos" value="{{ $beneficiario->apellidos }}" placeholder="Apellidos" required />
            </div>
            <div class="form-group">
                <label for="dni">DNI <a href="https://generadordni.es/#dni" target="_blank">(generar DNI aleatorio)</a></label>
                <input type="text" id="dni" name="dni" value="{{ $beneficiario->dni }}" placeholder="DNI" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="example@example.com" value="{{ $beneficiario->email }}"required />
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" id="fecha" name="fecha_nacimiento" value="{{ $beneficiario->fecha_nacimiento }}" required />
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono (9 dígitos)</label>
                <input type="text" id="telefono" name="telefono" value="{{ $beneficiario->telefono }}" placeholder="Número de Teléfono" required />
            </div>
            <div class="form-group">
                <label for="num_ss">Número de la Seguridad Social <a href="https://generadordni.es/#otrosdc" target="_blank">(generar número aleatorio)</a></label>
                <input type="text" id="num_ss" name="num_seguridad_social" value="{{ $beneficiario->num_seguridad_social }}" placeholder="Número de la Seguridad Social" required />
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="Hombre" {{ $beneficiario->sexo == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                    <option value="Mujer" {{ $beneficiario->sexo == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado Civil</label>
                <select id="estado_civil" name="estado_civil" required>
                    <option value="Soltero" {{ $beneficiario->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Casado" {{ $beneficiario->estado_civil == 'Casado' ? 'selected' : '' }}>Casado</option>
                    <option value="Viudo" {{ $beneficiario->estado_civil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                    <option value="Viviendo en pareja" {{ $beneficiario->estado_civil == 'Viviendo en pareja' ? 'selected' : '' }}>Viviendo en pareja</option>
                    <option value="Divorciado" {{ $beneficiario->estado_civil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_beneficiario">Tipo de beneficiario</label>
                <select id="tipo_beneficiario" name="tipo_beneficiario" required>
                    <option value="Dependiente" {{ $beneficiario->tipo_beneficiario == 'Dependiente' ? 'selected' : '' }}>Dependiente</option>
                    <option value="EnfermedadCronica" {{ $beneficiario->tipo_beneficiario == 'EnfermedadCronica' ? 'selected' : '' }}>Enfermedad Crónica</option>
                    <option value="Victima_de_violencia_de_género" {{ $beneficiario->tipo_beneficiario == 'Victima_de_violencia_de_género' ? 'selected' : '' }}>Víctima de violencia de género</option>
                    <option value="Mayores_de_65" {{ $beneficiario->tipo_beneficiario == 'Mayores_de_65' ? 'selected' : '' }}>Mayores de 65 años</option>
                    <option value="Persona_con_discapacidad" {{ $beneficiario->tipo_beneficiario == 'Persona_con_discapacidad' ? 'selected' : '' }}>Persona con discapacidad</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección (calle y número)</label>
                <input type="text" id="direccion" name="direccion" value="{{ $beneficiario->direccion }}" placeholder="Dirección" required />
            </div>
            <div class="form-group">
                <label for="codigopostal">Código Postal <a href="https://www.correos.es/es/es/herramientas/codigos-postales/detalle" target="_blank">(consultar códigos postales)</a></label>
                <input type="text" id="codigopostal" name="codigo_postal" value="{{ $beneficiario->codigo_postal }}" placeholder="Código Postal" required />
            </div>
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" id="localidad" name="localidad" value="{{ $beneficiario->localidad }}" placeholder="Localidad" required />
            </div>
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <select id="provincia" name="provincia" required>
                    @foreach (['Álava/Araba', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Baleares', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ceuta', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gerona/Girona', 'Granada', 'Guadalajara', 'Guipúzcoa/Gipuzkoa', 'Huelva', 'Huesca', 'Jaén', 'La Coruña/A Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lérida/Lleida', 'Lugo', 'Madrid', 'Málaga', 'Melilla', 'Murcia', 'Navarra', 'Orense/Ourense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya/Bizkaia', 'Zamora', 'Zaragoza'] as $provincia)
                        <option value="{{ $provincia }}" {{ $beneficiario->provincia == $provincia ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="autonomia_personal">Autonomía personal</label>
                <select id="autonomia_personal" name="autonomia_personal" required>
                    @foreach(['ABVD_sin_ayuda', 'ABVD_con_ayuda', 'Se_desplaza_sin_ayuda', 'Se_desplaza_con_ayuda', 'Relacion_con_el_entorno', 'Soledad'] as $opcion)
                        <option value="{{ $opcion }}" {{ $beneficiario->autonomia_personal == $opcion ? 'selected' : '' }}>{{ str_replace('_', ' ', $opcion) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="situacion_familiar">Situación familiar</label>
                <select id="situacion_familiar" name="situacion_familiar" required>
                    @foreach(['Vive_solo', 'Acompañado', 'Vivienda_tutelada'] as $opcion)
                        <option value="{{ $opcion }}" {{ $beneficiario->situacion_familiar == $opcion ? 'selected' : '' }}>{{ str_replace('_', ' ', $opcion) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="situacion_sanitaria">Situación sanitaria</label>
                <input type="text" id="situacion_sanitaria" name="situacion_sanitaria" value="{{ $beneficiario->situacion_sanitaria }}" placeholder="Enfermedades, intervenciones quirúrgicas, etc." required />
            </div>
            <div class="form-group">
                <label for="situacion_de_la_vivienda">Situación de la vivienda</label>
                <input type="text" id="situacion_de_la_vivienda" name="situacion_de_la_vivienda" value="{{ $beneficiario->situacion_de_la_vivienda }}" placeholder="Barreras arquitectónicas, tipo de vivienda y ubicación" required />
            </div>
            <div class="form-group">
                <label for="situacion_economica">Situación económica</label>
                <input type="text" id="situacion_economica" name="situacion_economica" value="{{ $beneficiario->situacion_economica }}" placeholder="Pensión, ingresos, ayudas..." required />
            </div>
            <div class="form-group">
                <label for="otros_recursos">Otros recursos a los que tiene acceso</label>
                <input type="text" id="otros_recursos" name="otros_recursos" value="{{ $beneficiario->otros_recursos }}" placeholder="Centro de día, de respiro, etc." required />
            </div>
            <div class="form-group">
                <label for="instalacion_de_terminal">Instalación de terminal/UCR</label>
                <input type="text" id="instalacion_de_terminal" name="instalacion_de_terminal" value="{{ $beneficiario->instalacion_de_terminal }}" required />
            </div>
            <div class="form-group">
                <label for="otros_complementos_TAS">Otros complementos TAS avanzado</label>
                <select id="otros_complementos_TAS" name="otros_complementos_TAS" required>
                    @foreach(['no_tiene', 'detector_de_humos', 'gas', 'movimiento/inactividad', 'dispensador_de_medicación', 'detector_de_caidas', 'asistente_de_voz', 'telemedicina', 'otro'] as $complemento)
                        <option value="{{ $complemento }}" {{ $beneficiario->otros_complementos_TAS == $complemento ? 'selected' : '' }}>{{ str_replace('_', ' ', $complemento) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dispone_de_teleasistencia_movil">Dispone de teleasistencia móvil</label>
                <select id="dispone_de_teleasistencia_movil" name="dispone_de_teleasistencia_movil" required>
                    <option value="no" {{ $beneficiario->dispone_de_teleasistencia_movil == 'no' ? 'selected' : '' }}>No</option>
                    <option value="si" {{ $beneficiario->dispone_de_teleasistencia_movil == 'si' ? 'selected' : '' }}>Sí</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sistema_de_telelocalizacion">Sistema de telelocalización</label>
                <select id="sistema_de_telelocalizacion" name="sistema_de_telelocalizacion" required>
                    <option value="no" {{ $beneficiario->sistema_de_telelocalizacion == 'no' ? 'selected' : '' }}>No</option>
                    <option value="si" {{ $beneficiario->sistema_de_telelocalizacion == 'si' ? 'selected' : '' }}>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="custodia_de_llaves">Custodia de llaves</label>
                <select id="custodia_de_llaves" name="custodia_de_llaves" required>
                    <option value="no" {{ $beneficiario->custodia_de_llaves == 'no' ? 'selected' : '' }}>No</option>
                    <option value="si" {{ $beneficiario->custodia_de_llaves == 'si' ? 'selected' : '' }}>Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="enfermedades">Enfermedades (opcional)</label>
                <input type="text" id="enfermedades" name="enfermedades" value="{{ $beneficiario->beneficiarioInteres->enfermedades }}" placeholder="Enfermedades" />
            </div>
            <div class="form-group">
                <label for="alergias">Alergias (opcional)</label>
                <input type="text" id="alergias" name="alergias" value="{{ $beneficiario->beneficiarioInteres->alergias }}" placeholder="Alergias" />
            </div>
            <div class="form-group">
                <label for="medicacion_manana">Medicación Mañana (opcional)</label>
                <input type="text" id="medicacion_manana" name="medicacion_manana" value="{{ $beneficiario->beneficiarioInteres->medicacion_manana }}" placeholder="Medicación Mañana" />
            </div>
            <div class="form-group">
                <label for="medicacion_tarde">Medicación Tarde (opcional)</label>
                <input type="text" id="medicacion_tarde" name="medicacion_tarde" value="{{ $beneficiario->beneficiarioInteres->medicacion_tarde }}" placeholder="Medicación Tarde" />
            </div>
            <div class="form-group">
                <label for="medicacion_noche">Medicación Noche (opcional)</label>
                <input type="text" id="medicacion_noche" name="medicacion_noche" value="{{ $beneficiario->beneficiarioInteres->medicacion_noche }}" placeholder="Medicación Noche" />
            </div>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" id="observaciones" name="observaciones">{{ $beneficiario->observaciones }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Modificar</button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
