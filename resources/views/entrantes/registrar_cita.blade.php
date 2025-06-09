@extends('layouts.app')

@section('title', 'Registrar cita médica')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('entrantes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Registrar cita médica</h2>
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

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
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

    <form method="POST" action="{{ route('entrantes.rescita') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm formulario">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="dni_beneficiario" class="form-label">DNI del beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" class="form-control" placeholder="DNI del beneficiario" required>
            </div>
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" id="hora" name="hora" class="form-control" required>
            </div>
            <div class="col-12">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-5">Registrar cita médica</button>
        </div>
    </form>
</div>
@endsection
