@extends('principal.app')

@section('title' , 'Iniciar Sesión')

@section('content')
    <h1>Iniciar Sesión</h1>

    <table>
        <label for="emailUsuario">Inserta tu email: </label>
        <input name="emailUsuario" id="emailUsuario" type="email" placeholder="e-mail"/>

        <label for="passwordUsuario">Inserta tu contraseña: </label>
        <input name="passwordUsuario" id="passwordUsuario" type="password" placeholder="Contraseña"/>

    </table>

    <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">Volver al Inicio</a>


@endsection

