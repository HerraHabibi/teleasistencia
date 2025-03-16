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
                <label for="email">Email entrante</label>
                <input type="text" id="email" name="email" placeholder="Email entrante" required />
            </div>
            <div class="form-group">
                <label for="quien_llama">Quién llama</label>
                <input type="text" id="quien_llama" name="quien_llama" placeholder="Quién coge la llamada" required />
            </div>
            <div class="form-group">
                <label for="beneficiario">¿Es beneficiario?</label>
                <select id="beneficiario" name="beneficiario" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
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
                <label for="duracion">Duración</label>
                <input type="text" id="duracion" name="duracion" placeholder="0m0s" required />
            </div>
            <div class="form-group">
                <label for="tipo_llamada">Tipo de llamada</label>
                <select id="tipo_llamada" name="tipo_llamada" required>
                    <option value="Llamada entrante para conversar">Llamada entrante para conversar</option>
                    <option value="Llamada entrante para obtener información (teléfonos, horarios, direcciones...)">Llamada entrante para obtener información (teléfonos, horarios, direcciones...)</option>
                    <option value="Llamada entrante para pedir cita médica">Llamada entrante para pedir cita médica</option>
                    <option value="Llamada entrante para asistencia médica">Llamada entrante para asistencia médica</option>
                    <option value="Llamada entrante por accidente doméstico">Llamada entrante por accidente doméstico</option>
                    <option value="Otras llamadas entrantes">Otras llamadas entrantes</option>
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
@endsection
