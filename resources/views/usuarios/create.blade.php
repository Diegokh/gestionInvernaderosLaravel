@extends('principal.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="text-center">Crear Nuevo Usuario</h2>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Por favor, corrige los siguientes errores:</strong>
                </div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                {{-- NOMBRE --}}
                <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Nombre:</label>
                    <input type="text"
                           class="form-control @error('nombreUsuario') is-invalid @enderror"
                           name="nombreUsuario"
                           value="{{ old('nombreUsuario') }}"
                           required>
                    @error('nombreUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- APELLIDO --}}
                <div class="mb-3">
                    <label for="apellidoUsuario" class="form-label">Apellido:</label>
                    <input type="text"
                           class="form-control @error('apellidoUsuario') is-invalid @enderror"
                           name="apellidoUsuario"
                           value="{{ old('apellidoUsuario') }}"
                           required>
                    @error('apellidoUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Email:</label>
                    <input type="email"
                           class="form-control @error('emailUsuario') is-invalid @enderror"
                           name="emailUsuario"
                           value="{{ old('emailUsuario') }}"
                           required>
                    @error('emailUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label for="passwordUsuario" class="form-label">Contraseña:</label>
                    <input type="password"
                           class="form-control @error('passwordUsuario') is-invalid @enderror"
                           name="passwordUsuario"
                           required>
                    @error('passwordUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TELÉFONO --}}
                <div class="mb-3">
                    <label for="telefonoUsuario" class="form-label">Teléfono:</label>
                    <input type="text"
                           class="form-control @error('telefonoUsuario') is-invalid @enderror"
                           name="telefonoUsuario"
                           value="{{ old('telefonoUsuario') }}"
                           required>
                    @error('telefonoUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- ROL --}}
                <div class="mb-3">
                    <label for="rolUsuario" class="form-label">Rol:</label>
                    <select class="form-select @error('rolUsuario') is-invalid @enderror"
                            name="rolUsuario"
                            required>
                        <option value="" disabled selected>Selecciona un rol</option>
                        <option value="Administrador" {{ old('rolUsuario') == 'Administrador' ? 'selected' : '' }}>
                            Administrador
                        </option>
                        <option value="Estandar" {{ old('rolUsuario') == 'Estandar' ? 'selected' : '' }}>
                            Estandar
                        </option>
                    </select>
                    @error('rolUsuario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Guardar Usuario</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </form>
        </div>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
