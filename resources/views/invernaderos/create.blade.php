
@extends('principal.app')

@section('content')
    <h1>Crear Invernadero</h1>
    <form action="{{ route('invernaderos.store') }}" method="POST">
        @csrf
        <label for="ubicacionInvernadero">Ubicación:</label>
        <input type="text" name="ubicacionInvernadero" required>

        <label for="idUsuario">ID de Usuario:</label>
        <input type="number" name="idUsuario" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
