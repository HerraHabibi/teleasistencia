@extends('layout')

@section('seccion', 'Salientes')
@section('title', 'Registrar llamada saliente')
@section('ruta_volver', route('home'))
@section('content')
    <form class="beneficiary-form" method="post" action="{{ route('salientes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
                <input type="hidden" id="email_users" name="email_users" value="{{Auth::user()->email}}" required />
            <div class="form-group">
                <label for="email">Email al que llama</label>
                <input type="text" id="email" name="email" placeholder="Email al que llama" required />
            </div>
            <div class="form-group">
                <label for="responde">¿Responde?</label>
                <select id="responde" name="responde" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="intentos">Intentos</label>
                <input type="number" id="intentos" name="intentos" placeholder="Número de intentos" required />
            </div>
            <div class="form-group">
                <label for="quien_coge">Quién coge</label>
                <input type="text" id="quien_coge" name="quien_coge" placeholder="Quién coge la llamada" required />
            </div>
            <div class="form-group">
                <label for="beneficiario">¿Es beneficiario?</label>
                <select id="beneficiario" name="beneficiario" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" required />
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" id="hora" name="hora" required />
            </div>
            <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="text" id="duracion" name="duracion" placeholder="0m0s" required />
            </div>
            <div class="form-group">
                <label for="dni_beneficiario">DNI del beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" placeholder="DNI del beneficiario" required />
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de llamada</label>
                <select id="tipo" name="tipo" required>
                    <option value="Llamada saliente rutinaria por la mañana">Llamada saliente rutinaria por la mañana</option>
                    <option value="Llamada saliente rutinaria por la tarde">Llamada saliente rutinaria por la tarde</option>
                    <option value="Llamada saliente rutinaria por la noche">Llamada saliente rutinaria por la noche</option>
                    <option value="Llamada saliente para recordatorio de cita médica">Llamada saliente para recordatorio de cita médica</option>
                    <option value="Llamada saliente para felicitación de cumpleaños">Llamada saliente para felicitación de cumpleaños</option>
                    <option value="Llamada saliente atencion psicosocial">Atención psicosocial</option>
                    <option value="Llamada saliente detectar detectar situaciones riesgo">Detectar situaciones riesgo</option>
                    <option value="Llamada saliente apoyo al cuidador">Apoyo al cuidador</option>
                    <option value="Llamada saliente Actualización informacion">Actualización información</option>
                    <optgroup label="Avisos">
                        <option value="Llamada saliente medicacion">Medicación</option>
                        <option value="Llamada saliente especiales">Especiales (Cumples, despertador, citas)</option>
                        <option value="Llamada saliente alerta">Alertas (Meteo)</option>
                    </optgroup>
                    <optgroup label="Seguimiento periódico">
                        <option value="Llamada saliente seguimiento periodico semanal">Semanal</option>
                        <option value="Llamada saliente seguimiento periodico quincenal">Quincenal</option>
                        <option value="Llamada saliente seguimiento periodico mensual">Mensual</option>
                    </optgroup>
                    <optgroup label="Seguimiento tras emergencia. Tipo: ">
                        <option value="Llamada seguimiento tras emergencia hospital">Hospital</option>
                        <option value="Llamada saliente seguimiento tras emergencia accidente">Accidente</option>
                        <option value="Llamada saliente seguimiento tras emergencia otro">Otro</option>
                    </optgroup>
                    <option value="Llamada saliente seguimiento proceso de duelo">Seguimiento proceso de duelo</option>
                    <option value="Llamada saliente seguimiento tras alta hospitalaria">Seguimiento tras alta hospitalaria</option>
                    <option value="Llamada saliente ausencia domiciliaria y regreso">Ausencia domiciliaria y regreso</option>
                    <option value="Llamada saliente suspension temporal del servicio">Suspensión temporal del servicio: Motivo explicar en observaciones</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="archivo">Archivo de audio adjunto</label>
            <input type="file" id="archivo" name="archivo" accept="audio/*" />
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn-submit">Registrar llamada saliente</button>
        </div>
    </form>
@endsection
