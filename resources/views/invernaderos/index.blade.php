@extends('principal.app')

@section('title', 'Lista de Invernaderos')

@section('content')
    <h1>Lista de Invernaderos</h1>
    

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>ID Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invernaderos as $invernadero)
            <tr>
                <td>{{ $invernadero->id_Invernadero }}</td>
                <td>{{ $invernadero->ubicacionInvernadero }}</td>
                <td>{{ $invernadero->idUsuario }}</td>
                <td>
                    <a href="{{ route('invernaderos.edit', $invernadero->id_Invernadero) }}"
                       class="btn btn-warning btn-sm">Editar</a>
    
                    <form action="{{ route('invernaderos.destroy', $invernadero->id_Invernadero) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que deseas eliminar este invernadero?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Menú de Inicio</a>
    <a href="{{ route('invernaderos.create') }}" class="btn btn-success">Crear Nuevo Invernadero</a>

@endsection
