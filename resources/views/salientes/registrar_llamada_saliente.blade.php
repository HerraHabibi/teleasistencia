@extends('layouts.app')

@section('title', 'Registrar llamada saliente')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('entrantes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Registrar llamada saliente</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('salientes.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <input type="hidden" id="email_users" name="email_users" value="{{Auth::user()->email}}" required>
        
        <div class="row g-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email al que llama</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email al que llama" required>
            </div>
            <div class="col-md-6">
                <label for="responde" class="form-label">¿Responde?</label>
                <select id="responde" name="responde" class="form-select" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
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
                <label for="intentos" class="form-label">Intentos</label>
                <input type="number" id="intentos" name="intentos" class="form-control" placeholder="Número de intentos" min="1" required>
            </div>
            <div class="col-md-6">
                <label for="quien_coge" class="form-label">Quién coge</label>
                <input type="text" id="quien_coge" name="quien_coge" class="form-control" placeholder="Quién coge la llamada" required>
            </div>
            <div class="col-md-6">
                <label for="beneficiario" class="form-label">¿Es beneficiario?</label>
                <select id="beneficiario" name="beneficiario" class="form-select" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="dni_beneficiario" class="form-label">DNI del beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" class="form-control" placeholder="DNI del beneficiario" required>
            </div>
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo de llamada</label>
                <select id="tipo" name="tipo" class="form-select" required>
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
            <button type="submit" class="btn btn-success px-5">Registrar llamada saliente</button>
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
