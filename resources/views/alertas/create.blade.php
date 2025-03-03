@extends('principal.app')

@section('title', 'Agregar Notificación de Alerta')

@section('content')
    <h1>Agregar Notificación de Alerta</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('alertas.store') }}">
        @csrf

        <div class="mb-3">
            <label for="idAlerta" class="form-label">Seleccionar Alerta:</label>
            <select name="idAlerta" id="idAlerta" class="form-control" required>
                @foreach($alertas as $alerta)
                    <option value="{{ $alerta->idAlerta }}">{{ $alerta->descripcionAlerta }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idUsuario" class="form-label">Seleccionar Usuario:</label>
            <select name="idUsuario" id="idUsuario" class="form-control" required onchange="filtrarInvernaderos()">
                <option value="">-- Selecciona un Usuario --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->idUsuario }}">{{ $usuario->nombreUsuario }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_Invernadero" class="form-label">Seleccionar Invernadero:</label>
            <select name="id_Invernadero" id="id_Invernadero" class="form-control" required>
                <option value="">-- Selecciona un Invernadero --</option>
                @foreach($invernaderos as $invernadero)
                    <option value="{{ $invernadero->id_Invernadero }}" data-usuario="{{ $invernadero->idUsuario }}">
                        {{ $invernadero->ubicacionInvernadero }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fechaNotificacion" class="form-label">Fecha de la Notificación:</label>
            <input type="date" name="fechaNotificacion" id="fechaNotificacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="horaNotificacion" class="form-label">Hora de la Notificación:</label>
            <input type="time" name="horaNotificacion" id="horaNotificacion" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Agregar Notificación</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        function filtrarInvernaderos() {
            let usuarioSeleccionado = document.getElementById('idUsuario').value;
            let invernaderos = document.getElementById('id_Invernadero');

            // Mostrar solo los invernaderos del usuario seleccionado
            Array.from(invernaderos.options).forEach(option => {
                if (option.value === "") {
                    option.hidden = false;
                    option.selected = true;
                } else {
                    option.hidden = option.getAttribute('data-usuario') !== usuarioSeleccionado;
                }
            });
        }
    </script>
@endsection
