@extends('principal.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="text-center">Editar Usuario</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.update', ['usuario' => $usuario->idUsuario]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombreUsuario" value="{{ $usuario->nombreUsuario }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidoUsuario" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellidoUsuario" value="{{ $usuario->apellidoUsuario }}" required>
                </div>

                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="emailUsuario" value="{{ $usuario->emailUsuario }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefonoUsuario" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefonoUsuario" value="{{ $usuario->telefonoUsuario }}" required>
                </div>

                <div class="mb-3">
                    <label for="rolUsuario" class="form-label">Rol:</label>
                    <select class="form-select" name="rolUsuario" required>
                        <option value="Administrador" {{ $usuario->rolUsuario == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="Estandar" {{ $usuario->rolUsuario == 'Estandar' ? 'selected' : '' }}>Estandar</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </form>
        </div>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
