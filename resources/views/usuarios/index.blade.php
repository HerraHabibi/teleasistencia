@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 titulo">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left fs-1"></i>
        </a>
    </div>
    <div class="flex-grow-1 text-center align-self-start">
        <h2 class="fw-bold m-0 nombre mx-auto">Lista de usuarios</h2>
    </div>
    <div style="width: 38px;"></div>
</div>

<div class="container-fluid mt-3">
    @if($usuarios->isEmpty())
        <div class="alert alert-warning text-center">No hay usuarios registrados.</div>
    @else
        <div class="table-responsive shadow rounded bg-white p-3">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary titulo-tabla">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Fecha de nacimiento</th>
                        <th>Último inicio de sesión</th>
                        <th>Verificado</th>
                        <th>Borrar usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->perfil == 0 ? 'Usuario' : 'Profe' }}</td>
                            <td>{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/Y') }}</td>
                            <td>{{ $usuario->last_login }}</td>
                            <td>
                                @if ($usuario->verificado == 1)
                                    Sí
                                @else
                                    <form method="POST" action="{{ route('usuarios.verificar', $usuario->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
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
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                            Borrar
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-outline-danger" disabled>
                                        Borrar
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
