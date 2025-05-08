@extends('layout')

@section('seccion', 'Entrantes')
@section('title', 'Registrar llamada entrante')
@section('ruta_volver', route('entrantes.index'))
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
    
    <form class="beneficiary-form" method="post" action="{{ route('entrantes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">

            <input type="hidden" id="email_users" name="email_users" value="{{Auth::user()->email}}" required />
            <div class="form-group">
                <label for="dni_beneficiario">DNI beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" placeholder="DNI" required />
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de inicio</label>
                <div>
                    <input type="datetime-local" id="hora_inicio" name="hora_inicio" step="1" required />
                    <button type="button" onclick="establecerHora('hora_inicio')">Ahora</button>
                </div>
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora de fin</label>
                <div>
                    <input type="datetime-local" id="hora_fin" name="hora_fin" step="1" required />
                    <button type="button" onclick="establecerHora('hora_fin')">Ahora</button>
                </div>
            </div>
            <div class="form-group">
                <label for="tipo_llamada">Tipo de llamada</label>
                <select id="tipo_llamada" name="tipo_llamada" required>
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
            <button type="submit" class="btn-submit">Registrar llamada entrante</button>
        </div>
    </form>
    
    <script>
        function establecerHora(input) {
            const ahora = new Date();
            const formato = ahora.toISOString().slice(0, 19);
            document.getElementById(input).value = formato;
        }
    </script>
@endsection
