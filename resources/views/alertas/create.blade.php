@extends('principal.app')

@section('title', 'Crear Alerta')

@section('content')
    <h1>Crear Nueva Alerta</h1>

    <form action="{{ route('alertas.store') }}" method="POST">
        @csrf
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
