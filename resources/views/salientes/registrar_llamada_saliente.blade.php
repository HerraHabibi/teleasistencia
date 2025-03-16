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
