@extends('principal.app')

@section('title', 'Historial de Control')

@section('content')
    <h1>Historial de Control</h1>

    @if($historial->isEmpty())
        <p class="text-danger">No hay registros de historial disponibles.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID Historial</th>
                <th>Acción</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Dispositivo</th>
                <th>ID Invernadero</th>
                @if(Auth::user()->rolUsuario == 'Estandar')
                <th>Acciones</th>
                @endif
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
                    <td>{{ $item->dispositivo->tipo_Dispositivo ?? 'No asignado' }}</td>
                    <td>{{ $item->invernadero->id_Invernadero ?? 'No asignado' }}</td>

                    @if(Auth::user()->rolUsuario == 'Estandar')
                    <td>
                        <form action="{{ route('historial.destroy', $item->idHistorial) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
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

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">Volver al Inicio</a>
@endsection
