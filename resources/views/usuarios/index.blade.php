{{-- resources/views/users/index.blade.php --}}

@extends('layout')

@section('seccion', 'Usuarios')
@section('title', 'Lista de Usuarios')
@section('ruta_volver', route('home'))
@section('content')
    @if($usuarios->isEmpty())
        <p>No hay usuarios registrados.</p>
    @else
        <table class="styled-table" align="center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Último Inicio de Sesión</th>
                    <th>Verificado</th>
                    <th>Borrar Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->perfil == 0 ? 'Usuario' : 'Profe' }}</td>
                        <td>{{ $usuario->fecha_nacimiento }}</td>
                        <td>{{ $usuario->last_login }}</td>
                        <td>
                            @if ($usuario->verificado == 1)
                                Sí
                            @else
                                <form method="POST" action="{{ route('usuarios.verificar', $usuario->id) }}">
                                    @csrf
                                    <button type="submit" class="btn-verify">
                                        Verificar
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if ($usuario->name !== 'Admin')
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                        Borrar
                                    </button>
                                </form>
                            @else
                                <button class="btn-delete" disabled>
                                    Borrar
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
