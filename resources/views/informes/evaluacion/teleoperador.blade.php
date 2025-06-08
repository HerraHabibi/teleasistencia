@extends('layout')

@section('seccion', 'Usuario')
@section('title', 'Evaluar Teleoperador')
@section('ruta_volver', route('evaluar.index'))
@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form class="beneficiary-form" method="post" action="{{route('evaluar.teleoperador.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">

            <div class="form-group">
                <label for="hora_inicio">Hora de inicio</label>
                <div>
                    <input type="datetime-local" id="hora_inicio" name="hora_inicio" step="1" required value="{{ old('hora_inicio') }}" />
                    <button type="button" onclick="establecerHora('hora_inicio')">Ahora</button>
                </div>
            </div>
            <div class="form-group">
                <label for="hora_fin">Hora final</label>
                <div>
                    <input type="datetime-local" id="hora_fin" name="hora_fin" step="1" required value="{{ old('hora_fin') }}" />
                    <button type="button" onclick="establecerHora('hora_fin')">Ahora</button>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre_usuario">Nombre del Evaluador</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario', Auth::user()->name) }}" required readonly />
            </div>
            <div class="form-group">
                <label for="nombre_teleoperador">Nombre del Teleoperador a evaluar</label>
                <input type="text" id="nombre_teleoperador" name="nombre_teleoperador" placeholder="Nombre del teleoperador" required value="{{ old('nombre_teleoperador') }}" />
            </div>
            <div class="form-group">
                <label for="email_usuario">Email del Evaluador</label>
                <input type="text" id="email_usuario" name="email_usuario" placeholder="Email del usuario" value="{{ old('email_usuario', Auth::user()->email) }}" required readonly />
            </div>
            <div class="form-group">
                <label for="email_teleoperador">Email del Teleoperador a evaluar</label>
                <input type="text" id="email_teleoperador" name="email_teleoperador" placeholder="Email del teleoperador" required value="{{ old('email_teleoperador') }}" />
            </div>

            <h3>Protocolo de Bienvenida</h3>
            <div class="form-group">
                <label for="bienvenida">El teleoperador/a lleva a cabo el protocolo de bienvenida respetando todos sus elementos:</label>
                <input type="number" id="bienvenida" name="bienvenida" min="1" max="10" required placeholder="Minimo 1, Maximo 10" value="{{ old('bienvenida') }}">
            </div>
            <h3>Relación Contenido-Caso</h3>
            <div class="form-group">
                <label for="contenido">La respuesta que ofrece la persona teleoperadora corresponde con la teoría:</label>
                <input type="number" id="contenido" name="contenido" min="1" max="10" required placeholder="Minimo 1, Maximo 10" value="{{ old('contenido') }}">
            </div>
            <h3>Uso de Estrategias de Comunicación</h3>
            <div class="form-group">
                <label for="comunicacion">El teleoperador/a utiliza las habilidades de escucha activa y de transmisión de información:</label>
                <input type="number" id="comunicacion" name="comunicacion" min="1" max="10" required placeholder="Minimo 1, Maximo 10" value="{{ old('comunicacion') }}">
            </div>
            <h3>Protocolo de Despedida</h3>
            <div class="form-group">
                <label for="despedida">El teleoperador/a lleva a cabo el protocolo de despedida respetando todos sus elementos:</label>
                <input type="number" id="despedida" name="despedida" min="1" max="10" required placeholder="Minimo 1, Maximo 10" value="{{ old('despedida') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" rows="4" cols="50">{{ old('observaciones') }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Enviar Evaluación</button>
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
