@extends('layouts.app')
@section('title', 'Datos de los contactos')
@section('content')
<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('informes.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Datos de los contactos</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    <form method="GET" action="{{ route('informes.contactos.buscar') }}" class="mb-4">
        <div class="d-flex justify-content-center">
            <div class="d-flex w-100" style="max-width: 600px;">
                <input 
                    type="text" 
                    name="buscar" 
                    value="{{ request('buscar') }}" 
                    class="form-control me-2" 
                    placeholder="Buscar por DNI, nombre y apellidos, email o teléfono"
                >
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>

    @if($contactos->isEmpty())
        <div class="alert alert-danger">
            @if(request('buscar'))
                No se encontraron contactos para la búsqueda: <strong>{{ request('buscar') }}</strong>.
            @else
                No hay contactos registrados.
            @endif
        </div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>DNI del Beneficiario</th>
                        <th>Nombre completo</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th>Email</th>
                        <th>Custodia llaves</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactos as $contacto)
                        <tr>
                            <td>{{ $contacto->dni_beneficiario }}</td>
                            <td>{{ $contacto->nombre . ' ' . $contacto->apellidos }}</td>
                            <td>{{ $contacto->telefono }}</td>
                            <td>{{ $contacto->tipo }}</td>
                            <td>{{ $contacto->direccion }}</td>
                            <td>{{ $contacto->codigopostal }}</td>
                            <td>{{ $contacto->localidad }}</td>
                            <td>{{ $contacto->provincia }}</td>
                            <td>{{ $contacto->email }}</td>
                            <td>{{ $contacto->dispone_llave_del_domicilio }}</td>
                            <td>{{ $contacto->observaciones }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
