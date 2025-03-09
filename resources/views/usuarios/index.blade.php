@extends('principal.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary text-center">Gestión de Usuarios</h1>

    <!-- Boton para abrir el modal de creacion -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
        Añadir Usuario
    </button>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla-usuarios">
            @foreach ($usuarios as $usuario)
                <tr id="fila-{{ $usuario->idUsuario }}">
                    <td>{{ $usuario->idUsuario }}</td>
                    <td id="nombre-{{ $usuario->idUsuario }}">{{ $usuario->nombreUsuario }}</td>
                    <td id="apellido-{{ $usuario->idUsuario }}">{{ $usuario->apellidoUsuario }}</td>
                    <td id="email-{{ $usuario->idUsuario }}">{{ $usuario->emailUsuario }}</td>
                    <td id="telefono-{{ $usuario->idUsuario }}">{{ $usuario->telefonoUsuario }}</td>
                    <td id="rol-{{ $usuario->idUsuario }}">{{ $usuario->rolUsuario }}</td>
                    <td>
                        <!-- Boton Editar -->
                        <button class="btn btn-warning btn-sm btn-editar"
                        data-id="{{ $usuario->idUsuario }}"
                        data-nombre="{{ $usuario->nombreUsuario }}"
                        data-apellido="{{ $usuario->apellidoUsuario }}"
                        data-email="{{ $usuario->emailUsuario }}"
                        data-telefono="{{ $usuario->telefonoUsuario }}"
                        data-rol="{{ $usuario->rolUsuario }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editarUsuarioModal">
                        Editar
                    </button>
                    

                        <form action="{{ route('usuarios.destroy', ['usuario' => $usuario->idUsuario]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Menú de Inicio</a>
</div>

<!-- MODAL PARA EDITAR USUARIO -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarUsuario">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editIdUsuario" name="idUsuario">
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="editNombre" name="nombreUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="editApellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="editApellido" name="apellidoUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="emailUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTelefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="editTelefono" name="telefonoUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRol" class="form-label">Rol:</label>
                        <select class="form-select" id="editRol" name="rolUsuario" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Estandar">Estandar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CREAR USUARIO -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCrearUsuario">
                    @csrf
                    <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidoUsuario" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellidoUsuario" name="apellidoUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailUsuario" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordUsuario" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefonoUsuario" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="telefonoUsuario" name="telefonoUsuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="rolUsuario" class="form-label">Rol:</label>
                        <select class="form-select" id="rolUsuario" name="rolUsuario" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Estandar">Estandar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        // ABRIR MODAL CON DATOS ACTUALES
        $('.btn-editar').click(function () {
            let id = $(this).data('id');
            let nombre = $(this).data('nombre');
            let apellido = $(this).data('apellido');
            let email = $(this).data('email');
            let telefono = $(this).data('telefono');
            let rol = $(this).data('rol');

            // Recibo los datos del usuarioen el modal de edicion
            $('#editIdUsuario').val(id);
            $('#editNombre').val(nombre);
            $('#editApellido').val(apellido);
            $('#editEmail').val(email);
            $('#editTelefono').val(telefono);
            $('#editRol').val(rol);
        });

        // AJAX PARA EDITAR
        $('#formEditarUsuario').submit(function (event) {
            event.preventDefault();
            let id = $('#editIdUsuario').val();
            let formData = $(this).serialize();

            $.ajax({
                url: "/usuarios/" + id,
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        // Actualizo la tabla con los nuevos datos
                        $('#nombre-' + id).text(response.usuario.nombreUsuario);
                        $('#apellido-' + id).text(response.usuario.apellidoUsuario);
                        $('#email-' + id).text(response.usuario.emailUsuario);
                        $('#telefono-' + id).text(response.usuario.telefonoUsuario);
                        $('#rol-' + id).text(response.usuario.rolUsuario);
                        $('#editarUsuarioModal').modal('hide'); 
                    } else {
                        alert("Error al actualizar el usuario.");
                    }
                },
                error: function () {
                    alert("Error en la solicitud.");
                }
            });
        });

        // AJAX PARA CREAR USUARIO
        $('#formCrearUsuario').submit(function (event) {
            event.preventDefault(); 

            $.ajax({
                url: "{{ route('usuarios.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        // Agrego el nuevo usuario a la tabla
                        $('#tabla-usuarios').append(`
                            <tr id="fila-${response.usuario.idUsuario}">
                                <td>${response.usuario.idUsuario}</td>
                                <td>${response.usuario.nombreUsuario}</td>
                                <td>${response.usuario.apellidoUsuario}</td>
                                <td>${response.usuario.emailUsuario}</td>
                                <td>${response.usuario.telefonoUsuario}</td>
                                <td>${response.usuario.rolUsuario}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm btn-editar"
                                        data-id="${response.usuario.idUsuario}"
                                        data-nombre="${response.usuario.nombreUsuario}"
                                        data-apellido="${response.usuario.apellidoUsuario}"
                                        data-email="${response.usuario.emailUsuario}"
                                        data-telefono="${response.usuario.telefonoUsuario}"
                                        data-rol="${response.usuario.rolUsuario}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editarUsuarioModal">
                                        Editar
                                    </button>
                                    <form action="/usuarios/${response.usuario.idUsuario}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        `);
                        $('#crearUsuarioModal').modal('hide');
                        $('#formCrearUsuario')[0].reset();
                    } else {
                        alert("Error al crear el usuario.");
                    }
                },
                error: function () {
                    alert("Error en la solicitud.");
                }
            });
        });
    
    });
</script>
@endsection
