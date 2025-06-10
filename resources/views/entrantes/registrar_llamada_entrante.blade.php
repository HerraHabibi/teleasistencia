@extends('layouts.app')

@section('title', 'Registrar llamada entrante')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('entrantes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Registrar llamada entrante</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    <x-alert />

    <form method="POST" action="{{ route('entrantes.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <input type="hidden" id="email_users" name="email_users" value="{{Auth::user()->email}}" required>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="dni_beneficiario" class="form-label">DNI beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" class="form-control" placeholder="DNI" required>
            </div>
            <div class="col-md-6">
                <label for="tipo_llamada" class="form-label">Tipo de llamada</label>
                <select id="tipo_llamada" name="tipo_llamada" class="form-select" required>
                    <optgroup label="Emergencia">
                        <option value="Emergencia: social">Social</option>
                        <option value="Emergencia: sanitaria">Sanitaria</option>
                        <option value="Emergencia: crisis de soledad">Crisis de soledad</option>
                        <option value="Emergencia: alarma sin respuesta">Alarma sin respuesta</option>
                    </optgroup>
                    <optgroup label="No emergencia">
                        <option value="No emergencia: comunicación ausencia/regreso">Comunicación ausencia/regreso</option>
                        <option value="No emergencia: modificación de datos">Modificación de datos</option>
                        <option value="No emergencia: pulsación por error">Pulsación por error</option>
                        <option value="No emergencia: petición de información">Petición de información</option>
                        <option value="No emergencia: sugerencia">Sugerencia</option>
                        <option value="No emergencia: reclamación o queja">Reclamación o queja</option>
                        <option value="No emergencia: saludo/conversación">Saludo/Conversación</option>
                    </optgroup>
                    <optgroup label="Técnica">
                        <option value="Técnica: por pulsación: primera conexión">Por pulsación: Primera conexión</option>
                        <option value="Técnica: por pulsación: revisión">Por pulsación: Revisión</option>
                        <option value="Técnica: por pulsación: fallo o avería">Por pulsación: Fallo o avería</option>
                        <option value="Técnica: por pulsación: sustitución de terminal/UCR">Por pulsación: Sustitución de terminal/UCR</option>
                        <option value="Técnica: por pulsación: retirada de terminal">Por pulsación: Retirada de terminal</option>
                        <option value="Técnica: automática: fallo de protocolo">Automática: Fallo de protocolo</option>
                        <option value="Técnica: automática: fallo de conexión con el servidor">Automática: Fallo de conexión con el servidor</option>
                        <option value="Técnica: automática: saturación del tráfico de comunicaciones">Automática: Saturación del tráfico de comunicaciones</option>
                        <option value="Técnica: automática: fallo en la red eléctrica">Automática: Fallo en la red eléctrica</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-6">
                <label for="hora_inicio" class="form-label">Hora de inicio</label>
                <div class="d-flex gap-2">
                    <input type="datetime-local" id="hora_inicio" name="hora_inicio" class="form-control" step="1" required>
                    <button type="button" class="btn btn-primary btn-sm" onclick="establecerHora('hora_inicio')">Ahora</button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="hora_fin" class="form-label">Hora de fin</label>
                <div class="d-flex gap-2">
                    <input type="datetime-local" id="hora_fin" name="hora_fin" class="form-control" step="1" required>
                    <button type="button" class="btn btn-primary btn-sm" onclick="establecerHora('hora_fin')">Ahora</button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="nivel_activacion" class="form-label">Nivel de activación</label>
                <select id="nivel_activacion" name="nivel_activacion" class="form-select" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="archivo" class="form-label">Archivo de audio adjunto</label>
                <input type="file" id="archivo" name="archivo" class="form-control" accept="audio/*">
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Registrar llamada entrante</button>
        </div>
    </form>
</div>

<script>
    function establecerHora(input) {
        const ahora = new Date();
        const formato = ahora.toISOString().slice(0, 19);
        document.getElementById(input).value = formato;
    }
</script>
@endsection
