@extends('principal.app')

@section('title', 'Notificaciones de Alertas')

@section('content')
    <h1>Notificaciones de Alertas</h1>

    @if(Auth::user()->rolUsuario == 'Administrador')
        <a href="{{ route('alertas.create') }}" class="btn btn-success mb-3">Agregar Nueva Notificación</a>
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

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Inicio</a>
@endsection
