@extends('principal.app')

@section('title', 'Editar Alerta')

@section('content')
    <h1>Editar Alerta</h1>

    <form action="{{ route('alertas.update', $alerta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="{{ $alerta->tipo }}" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required>{{ $alerta->descripcion }}</textarea>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ $alerta->fecha }}" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
