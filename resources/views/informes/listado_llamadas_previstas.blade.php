@extends('layout')

@section('seccion', 'Informes')
@section('title','Lllamadas previstas')
@section('ruta_volver', route('informes.index'))
@section('content')
    <form method="POST" action="{{ route('informes.previstas.buscar') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group centrar-acortar">
            <label for="opcion">Selecciona una opción:</label>
            <select id="opcion" name="opcion" class="select-bonito" required>
                {{-- <option value="llamadas_manana">Ver la lista de llamadas previstas para realizar por la mañana</option>
                <option value="llamadas_tarde">Ver la lista de llamadas previstas para realizar por la tarde</option>
                <option value="llamadas_noche">Ver la lista de llamadas previstas para realizar por la noche</option> --}}
                <option value="citas_medicas_hoy">Consultar las citas médicas previstas para hoy</option>
                <option value="cumpleaneros_hoy">Consultar los beneficiarios que cumplen años hoy</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Buscar</button>
        </div>
    </form>
@endsection
