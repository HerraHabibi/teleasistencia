@extends('layout')

@section('seccion', 'Gestión')
@section('title', 'Alta beneficiario')
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
    <form class="beneficiary-form" method="post" action="{{ route('gestion.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="nombre">Nombre y apellidos</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required />
                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required />
            </div>
            <div class="form-group">
                <label for="dni">DNI <a href="https://generadordni.es/#dni" target="_blank" >(generar DNI aleatorio)</a></label>
                <input type="text" id="dni" name="dni" placeholder="DNI" required />
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required />
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono (9 dígitos)</label>
                <input type="text" id="telefono" name="telefono" placeholder="Número de Teléfono" required />
            </div>
            <div class="form-group">
                <label for="num_ss">Número de la Seguridad Social <a href="https://generadordni.es/#otrosdc" target="_blank">(generar número aleatorio)</a></label>
                <input type="text" id="num_seguridad_social" name="num_seguridad_social" placeholder="Número de la Seguridad Social" required />
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado_civil">Estado Civil</label>
                <select id="estado_civil" name="estado_civil" required>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Viudo">Viudo</option>
                    <option value="Viviendo en pareja">Viviendo en pareja</option>
                    <option value="Divorciado">Divorciado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_beneficiario">Tipo de beneficiario</label>
                <select id="tipo_beneficiario" name="tipo_beneficiario" required>
                    <option value="Dependiente">Dependiente</option>
                    <option value="EnfermedadCronica">Enfermedad Crónica</option>
                    <option value="Victima_de_violencia_de_género">Víctima de violencia de género</option>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección (calle y número)</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" required />
            </div>
            <div class="form-group">
                <label for="codigopostal">Código Postal <a href="https://www.correos.es/es/es/herramientas/codigos-postales/detalle" target="_blank">(consultar códigos postales)</a></label>
                <input type="text" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" required />
            </div>
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" id="localidad" name="localidad" placeholder="Localidad" required />
            </div>
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <select id="provincia" name="provincia" required>
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
            <div class="form-group">
                <label for="mayor65">Es mayor de 65</label>
                <select id="mayor65" name="mayor65" required>
                    <option value="Si">Sí</option>
                    <option value="No">No</option>
                </select>
            </div>   
            <div class="form-group">
                <label for="discapacidad">Persona con discapacidad</label>
                <select id="discapacidad" name="discapacidad" required>
                    <option value="Si">Sí</option>
                    <option value="No">No</option>
                </select>
            </div>  
            <div class="form-group">
                <label for="autonomia_personal">Autonomía personal</label>
                <select id="autonomia_personal" name="autonomia_personal" required>
                    <option value="ABVD_solo">ABVD solo</option>
                    <option value="ABVD_con_ayuda">ABVD con ayuda</option>
                    <option value="Se_desplaza_solo">Se desplaza solo</option>
                    <option value="Se_desplaza_con_ayuda">Se desplaza con ayuda</option>
                    <option value="Relacion_con_el_entorno">Relación con el entorno</option>
                    <option value="Soledad">Soledad</option>
                </select>
            </div>  
            <div class="form-group">
                <label for="situacion_familiar">Situación_familiar</label>
                <select id="situacion_familiar" name="situacion_familiar" requobservacionesired>
                    <option value="Vive_solo">Vive solo</option>
                    <option value="Acompañado">Acompañado</option>
                    <option value="Vivienda_tutelada">Vivienda tutelada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Situacion_sanitaria">Situación sanitaria</label>
                <input type="text" id="Situacion_sanitaria" name="Situacion_sanitaria" placeholder="Enfermedades, intervenciones quirúrgicas, etc." required/>
            </div>  
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" id="observaciones" name="observaciones"/>
            </div>  
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="example@example.com" required />
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Dar de alta</button>
        </div>
        
    </form>
@endsection