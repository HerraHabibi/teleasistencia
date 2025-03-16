@extends('layout')

@section('seccion', 'Entrantes')
@section('title', 'Registrar cita médica')
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
    <form class="beneficiary-form" method="post" action="{{ route('entrantes.rescita') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">

            <div class="form-group">
                <label for="dni_beneficiario">DNI del beneficiario</label>
                <input type="text" id="dni_beneficiario" name="dni_beneficiario" placeholder="DNI del beneficiario" required />
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
                <label for="observaciones">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="4" cols="50"></textarea>
            </div>
            
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Registrar cita médica</button>
        </div>
    </form>
@endsection
