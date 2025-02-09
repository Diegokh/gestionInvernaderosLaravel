<!-- resources/views/invernaderos/edit.blade.php -->
@extends('principal.app')

@section('content')
    <h1>Editar Invernadero</h1>
    <form action="{{ route('invernaderos.update', $invernadero->id_Invernadero) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="ubicacionInvernadero">Ubicación:</label>
        <input type="text" name="ubicacionInvernadero" 
               value="{{ $invernadero->ubicacionInvernadero }}" required>

        <label for="idUsuario">ID de Usuario:</label>
        <input type="number" name="idUsuario" 
               value="{{ $invernadero->idUsuario }}" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
