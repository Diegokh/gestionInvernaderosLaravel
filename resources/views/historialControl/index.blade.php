@extends('principal.app')

@section('title', 'Historial de Control')

@section('content')
    <h1>Historial de Control</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Historial</th>
                <th>Acción</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Dispositivo</th>
                <th>ID Invernadero</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historial as $item)
                <tr>
                    <td>{{ $item->idHistorial }}</td>

                    <td>
                        @if ($item->accionHistorial == 1)
                            ENCENDIDO
                        @elseif ($item->accionHistorial == 2)
                            APAGADO
                        @else
                            DESCONOCIDO
                        @endif
                    </td>

                    <td>{{ $item->fechaHistorial }}</td>
                    <td>{{ $item->horaHistorial }}</td>
                    <td>{{ $item->tipo_Dispositivo }}</td>
                    <td>{{ $item->id_Invernadero }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">Volver al Inicio</a>
@endsection
