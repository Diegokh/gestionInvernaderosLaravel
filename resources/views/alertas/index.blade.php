@extends('principal.app')

@section('title', 'Notificaciones de Alertas')

@section('content')
    <h1>Notificaciones de Alertas</h1>
    
    @if(Auth::user()->rolUsuario == 'Administrador')
    <button type="button" class="btn btn-primary" id="btnCrearAlerta" data-toggle="modal" data-target="#crearAlertaModal">
        Crear Alerta
    </button>
    
    @endif

    @if($notificaciones->isEmpty())
        <p class="text-danger">No hay notificaciones registradas.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID Notificación</th>
                <th>Usuario</th>
                <th>Invernadero</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripción</th>
                @if(Auth::user()->rolUsuario == 'Estandar')
                    <th>Eliminar</th> 
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($notificaciones as $notif)
                <tr>
                    <td>{{ $notif->idNotificacion }}</td>
                    <td>{{ $notif->usuario->nombreUsuario ?? 'No asignado' }}</td>
                    <td>{{ $notif->invernadero->ubicacionInvernadero ?? 'No asignado' }}</td>
                    <td>{{ $notif->fechaNotificacion }}</td>
                    <td>{{ $notif->horaNotificacion }}</td>
                    <td>{{ $notif->alerta->descripcionAlerta ?? 'No asignado' }}</td>
                    
                    @if(Auth::user()->rolUsuario == 'Estandar')
                        <td>
                            <form action="{{ route('alertas.destroy', $notif->idNotificacion) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta alerta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="crearAlertaModal" tabindex="-1" role="dialog" aria-labelledby="crearAlertaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearAlertaModalLabel">Crear Alerta</h5>
                  
                </div>
                <div class="modal-body">
                    <form id="formCrearAlerta">
                        @csrf
                        <div class="form-group">
                            <label for="idAlerta">ID Alerta</label>
                            <input type="text" class="form-control" id="idAlerta" name="idAlerta" required>
                        </div>
                        <div class="form-group">
                            <label for="idUsuario">ID Usuario</label>
                            <input type="text" class="form-control" id="idUsuario" name="idUsuario" required>
                        </div>
                        <div class="form-group">
                            <label for="id_Invernadero">ID Invernadero</label>
                            <input type="text" class="form-control" id="id_Invernadero" name="id_Invernadero" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaNotificacion">Fecha Notificación</label>
                            <input type="date" class="form-control" id="fechaNotificacion" name="fechaNotificacion" required>
                        </div>
                        <div class="form-group">
                            <label for="horaNotificacion">Hora Notificación</label>
                            <input type="time" class="form-control" id="horaNotificacion" name="horaNotificacion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#btnCrearAlerta').click(function() {
        $('#crearAlertaModal').modal('show');
    });
        $('#formCrearAlerta').submit(function(event) {
            event.preventDefault(); // Previene el envío del formulario por defecto

            $.ajax({
                url: "{{ route('alertas.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert('Alerta creada exitosamente');
                    $('#crearAlertaModal').modal('hide'); // Cerrar el modal
                    location.reload(); // Recargar la página para ver la nueva alerta
                },
                error: function(xhr) {
                    alert('Error al crear la alerta');
                }
            });
        });
    });
</script>

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Inicio</a>
@endsection
