@extends('principal.app')

@section('title', 'Login de Usuario')

@push('styles')
    <style>
        body {
            background: url("{{ asset('images/bkgIMG.jpg') }}");
        }
    </style>
@endpush

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 w-50">
            <h2 class="text-center text-primary">Iniciar Sesión</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="emailUsuario" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="emailUsuario" name="emailUsuario" class="form-control" value="{{ old('emailUsuario') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="passwordUsuario" class="form-label">Contraseña:</label>
                    <input type="password" id="passwordUsuario" name="passwordUsuario" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
@endsection
