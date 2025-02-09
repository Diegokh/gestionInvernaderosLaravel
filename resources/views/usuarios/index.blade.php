<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="text-primary text-center">Gestión de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success">Añadir Usuario</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->idUsuario }}</td>
                    <td>{{ $usuario->nombreUsuario }}</td>
                    <td>{{ $usuario->apellidoUsuario }}</td>
                    <td>{{ $usuario->emailUsuario }}</td>
                    <td>{{ $usuario->telefonoUsuario }}</td>
                    <td>{{ $usuario->rolUsuario }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', ['usuario' => $usuario->idUsuario]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('usuarios.destroy', ['usuario' => $usuario->idUsuario]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('inicio') }}" class="btn btn-primary mt-4">Volver al Menú de Inicio</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
