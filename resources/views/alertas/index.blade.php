@extends('principal.app')

@section('title', 'Notificaciones de Alertas')

@section('content')
    <h1>Notificaciones de Alertas</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Notificación</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>ID Usuario</th>
                <th>ID Invernadero</th>
                <th>ID Alerta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notificaciones as $notif)
                <tr>
                    <td>{{ $notif->idNotificacion }}</td>
                    <td>{{ $notif->fechaNotificacion }}</td>
                    <td>{{ $notif->horaNotificacion }}</td>
                    <td>{{ $notif->idUsuario }}</td>
                    <td>{{ $notif->id_Invernadero }}</td>
                    <td>{{ $notif->descripcionAlerta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">
        Volver al Inicio
    </a>
@endsection
