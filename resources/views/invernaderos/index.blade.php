@extends('principal.app')

@section('title', 'Lista de Invernaderos')

@section('content')
    <h1>Lista de Invernaderos</h1>

    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#crearInvernaderoModal">
        Crear Nuevo Invernadero
    </button>

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>ID Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla-invernaderos">
            @foreach ($invernaderos as $invernadero)
                <tr id="fila-{{ $invernadero->id_Invernadero }}">
                    <td>{{ $invernadero->id_Invernadero }}</td>
                    <td id="ubicacion-{{ $invernadero->id_Invernadero }}">{{ $invernadero->ubicacionInvernadero }}</td>
                    <td id="usuario-{{ $invernadero->id_Invernadero }}">{{ $invernadero->idUsuario }}</td>
                    <td>
                        <!-- Boton de editar  -->
                        <button class="btn btn-warning btn-sm btn-editar"
                                data-id="{{ $invernadero->id_Invernadero }}"
                                data-ubicacion="{{ $invernadero->ubicacionInvernadero }}"
                                data-usuario="{{ $invernadero->idUsuario }}"
                                data-bs-toggle="modal"
                                data-bs-target="#editarInvernaderoModal">
                            Editar
                        </button>

                        <form action="{{ route('invernaderos.destroy', $invernadero->id_Invernadero) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este invernadero?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Menú de Inicio</a>

    <!-- MODAL CREAR INVERNADERO -->
    <div class="modal fade" id="crearInvernaderoModal" tabindex="-1" aria-labelledby="crearInvernaderoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearInvernaderoModalLabel">Crear Nuevo Invernadero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCrearInvernadero">
                        @csrf
                        <div class="mb-3">
                            <label for="ubicacionInvernadero" class="form-label">Ubicación:</label>
                            <input type="text" class="form-control" id="ubicacionInvernadero" name="ubicacionInvernadero" required>
                        </div>
                        <div class="mb-3">
                            <label for="idUsuario" class="form-label">ID de Usuario:</label>
                            <input type="number" class="form-control" id="idUsuario" name="idUsuario" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR INVERNADERO -->
    <div class="modal fade" id="editarInvernaderoModal" tabindex="-1" aria-labelledby="editarInvernaderoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Invernadero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarInvernadero">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editIdInvernadero" name="id_Invernadero">
                        <div class="mb-3">
                            <label for="editUbicacion" class="form-label">Ubicación:</label>
                            <input type="text" class="form-control" id="editUbicacion" name="ubicacionInvernadero" required>
                        </div>
                        <div class="mb-3">
                            <label for="editIdUsuario" class="form-label">ID de Usuario:</label>
                            <input type="number" class="form-control" id="editIdUsuario" name="idUsuario" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // ABRIR MODAL CON DATOS
            $('.btn-editar').click(function () {
                $('#editIdInvernadero').val($(this).data('id'));
                $('#editUbicacion').val($(this).data('ubicacion'));
                $('#editIdUsuario').val($(this).data('usuario'));
            });

            // AJAX EDITAR
            $('#formEditarInvernadero').submit(function (event) {
                event.preventDefault();
                let id = $('#editIdInvernadero').val();
                let formData = $(this).serialize();

                $.ajax({
                    url: "/invernaderos/" + id,
                    method: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            $('#ubicacion-' + id).text(response.invernadero.ubicacionInvernadero);
                            $('#usuario-' + id).text(response.invernadero.idUsuario);
                            $('#editarInvernaderoModal').modal('hide');
                        } else {
                            alert("Error al actualizar el invernadero.");
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
