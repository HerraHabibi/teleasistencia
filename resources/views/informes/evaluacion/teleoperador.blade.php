@extends('layouts.app')

@section('title', 'Evaluar teleoperador')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('evaluar.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Evaluar teleoperador</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: @json(session('success')),
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: @json(session('error')),
                confirmButtonColor: '#d33',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Errores de validación',
                html: `
                    <ul style="text-align: left; padding-left: 1.2em;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonColor: '#d33',
                customClass: {
                    popup: 'swal-wide'
                }
            });
        </script>
    @endif

    <form method="POST" action="{{ route('evaluar.teleoperador.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="hora_inicio" class="form-label">Hora de inicio</label>
                <div class="d-flex gap-2">
                    <input type="datetime-local" id="hora_inicio" name="hora_inicio" class="form-control" step="1" required value="{{ old('hora_inicio') }}">
                    <button type="button" class="btn btn-primary btn-sm" onclick="establecerHora('hora_inicio')">Ahora</button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="hora_fin" class="form-label">Hora final</label>
                <div class="d-flex gap-2">
                    <input type="datetime-local" id="hora_fin" name="hora_fin" class="form-control" step="1" required value="{{ old('hora_fin') }}">
                    <button type="button" class="btn btn-primary btn-sm" onclick="establecerHora('hora_fin')">Ahora</button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="nombre_usuario" class="form-label">Nombre del Evaluador</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', Auth::user()->name) }}" required readonly>
            </div>
            <div class="col-md-6">
                <label for="nombre_teleoperador" class="form-label">Nombre del Teleoperador a evaluar</label>
                <input type="text" id="nombre_teleoperador" name="nombre_teleoperador" class="form-control" placeholder="Nombre del teleoperador" required value="{{ old('nombre_teleoperador') }}">
            </div>
            <div class="col-md-6">
                <label for="email_usuario" class="form-label">Email del Evaluador</label>
                <input type="text" id="email_usuario" name="email_usuario" class="form-control" placeholder="Email del usuario" value="{{ old('email_usuario', Auth::user()->email) }}" required readonly>
            </div>
            <div class="col-md-6">
                <label for="email_teleoperador" class="form-label">Email del Teleoperador a evaluar</label>
                <input type="text" id="email_teleoperador" name="email_teleoperador" class="form-control" placeholder="Email del teleoperador" required value="{{ old('email_teleoperador') }}">
            </div>
        </div>

        <div class="row g-3 mt-4">
            <div class="col-12">
                <h3 class="h5 fw-bold mb-3">Protocolo de Bienvenida</h3>
            </div>
            <div class="col-12">
                <label for="bienvenida" class="form-label">El teleoperador/a lleva a cabo el protocolo de bienvenida respetando todos sus elementos:</label>
                <input type="number" id="bienvenida" name="bienvenida" class="form-control" min="1" max="10" required placeholder="Mínimo 1, Máximo 10" value="{{ old('bienvenida') }}">
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12">
                <h3 class="h5 fw-bold mb-3">Relación Contenido-Caso</h3>
            </div>
            <div class="col-12">
                <label for="contenido" class="form-label">La respuesta que ofrece la persona teleoperadora corresponde con la teoría:</label>
                <input type="number" id="contenido" name="contenido" class="form-control" min="1" max="10" required placeholder="Mínimo 1, Máximo 10" value="{{ old('contenido') }}">
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12">
                <h3 class="h5 fw-bold mb-3">Uso de Estrategias de Comunicación</h3>
            </div>
            <div class="col-12">
                <label for="comunicacion" class="form-label">El teleoperador/a utiliza las habilidades de escucha activa y de transmisión de información:</label>
                <input type="number" id="comunicacion" name="comunicacion" class="form-control" min="1" max="10" required placeholder="Mínimo 1, Máximo 10" value="{{ old('comunicacion') }}">
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12">
                <h3 class="h5 fw-bold mb-3">Protocolo de Despedida</h3>
            </div>
            <div class="col-12">
                <label for="despedida" class="form-label">El teleoperador/a lleva a cabo el protocolo de despedida respetando todos sus elementos:</label>
                <input type="number" id="despedida" name="despedida" class="form-control" min="1" max="10" required placeholder="Mínimo 1, Máximo 10" value="{{ old('despedida') }}">
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="4">{{ old('observaciones') }}</textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Enviar Evaluación</button>
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
