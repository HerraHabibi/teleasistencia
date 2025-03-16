@extends('layout')

@section('seccion', 'Informes')
@section('title','Listado Beneficiarios')
@section('ruta_volver', route('informes.index'))
@section('content')
    <form method="POST" action="{{ route('informes.beneficiarios.buscar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="opcion">Selecciona una opción:</label>
            <select id="opcion" name="opcion" class="select-bonito" required>
                <option value="dni">Listado de beneficiarios (ordenados por DNI)</option>
                <option value="sexo">Listado de beneficiarios (ordenados por sexo)</option>
                <option value="tipo">Listado de beneficiarios (ordenados por tipo de beneficiario)</option>
                <option value="provincia">Listado de beneficiarios (ordenados por provincia)</option>
                <option value="estado_civil">Listado de beneficiarios (ordenados por estado civil)</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
