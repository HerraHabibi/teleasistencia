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
                <option value="dni">Listado de contactos (ordenados por apellidos)</option>
                <option value="sexo">Listado de contactos (ordenados por tipo de contacto)</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
